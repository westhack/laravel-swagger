<?php

namespace Westhack\LaravelSwagger\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Response;

class SwaggerApiController extends Controller
{
    /**
     * @var string|array|\Symfony\Component\Finder\Finder The directory(s) or filename(s).
     * If you configured the directory must be full path of the directory.
     */
    protected $scanDir;
    /**
     * @var array The options passed to `Swagger`, Please refer the `Swagger\scan` function for more information.
     */
    protected $scanOptions = [];
    /**
     * @var \Illuminate\Support\Facades\Cache the cache object or the ID of the cache application component that is used to store
     * Cache the \Swagger\Scan
     */
    protected $cache;

    protected $cacheType = 'file';
    /**
     * @var bool If enable caching the scan result.
     */
    protected $enableCache = false;
    /**
     * @var string Cache key
     * [[cache]] must not be null
     */
    protected $cacheKey = 'api-swagger-cache';

    public function __construct()
    {
        $this->cache = Cache::store(config('swagger.cacheType', $this->cacheType));
        $this->scanDir = config('swagger.scan_dir', app_path());
        $this->scanOptions = config('swagger.scan_options', $this->scanOptions);
        $this->enableCache = config('swagger.enable_cache', $this->enableCache);
        $this->cacheKey = config('swagger.cache_key', $this->cacheKey);

        $this->initCors();
    }

    public function index()
    {
        $this->clearCache();

        if ($this->enableCache) {
            if (($swagger = $this->cache->get($this->cacheKey)) === false) {
                $swagger = $this->getSwagger();
                $this->cache->put($this->cacheKey, $swagger);
            }
        } else {
            $swagger = $this->getSwagger();
        }

        return $swagger;
    }

    /**
     * Init cors.
     */
    protected function initCors()
    {
        $response = Response::create();

        $response->header('Access-Control-Allow-Headers', implode(', ', ['Content-Type', 'Authorization']));
        $response->header('Access-Control-Allow-Methods', 'GET, POST, DELETE, PUT');
        $response->header('Access-Control-Allow-Origin', '*');
    }

    protected function clearCache()
    {
        $clearCache = request('clear-cache', false);
        if ($clearCache !== false) {
            $this->cache->forget($this->cacheKey);
        }
    }

    /**
     * Get swagger object
     *
     * @return string
     */
    protected function getSwagger()
    {
        $scanDirs = array_map(
            function ($path) {
                return base_path($path);
            },
            array_wrap($this->scanDir)
        );

        return \OpenApi\scan($scanDirs, $this->scanOptions)->toJson();
    }
}
