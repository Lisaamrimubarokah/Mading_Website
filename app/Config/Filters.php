<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'authfilter' => \App\Filters\AuthFilter::class,
        'filteradmin' => \App\Filters\FilterAdmin::class,
        'filterkonten' => \App\Filters\FilterKonten::class,
        'filterdosen' => \App\Filters\FilterDosen::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'filteradmin' => [ 'except' => [
				'auth', 'auth/*', 
				'front', 'front/*',
				'/',
                'berita/full', 'berita/baca*', 'berita/all',
                'pengumuman/full', 'pengumuman/baca*', 'pengumuman/all',
                'jadwal/view', 
			]],
            'filterkonten' => [ 'except' => [
				'auth', 'auth/*', 
				'front', 'front/*',
				'/',
                'berita/full', 'berita/baca*', 'berita/all',
                'pengumuman/full', 'pengumuman/baca*', 'pengumuman/all',
                'jadwal/view', 
			]],
            'filterdosen' => [ 'except' => [
				'auth', 'auth/*', 
				'front', 'front/*',
				'/',
                'berita/full', 'berita/baca*', 'berita/all',
                'pengumuman/full', 'pengumuman/baca*', 'pengumuman/all',
                'jadwal/view', 
			]],

        
        ],
        'after' => [
            'filteradmin' => [ 'except' => [
				'dashboard', 'dashboard/*',
                'front', 'front/*',
				'/', 
				'berita', 'berita/*',
				'pengumuman', 'pengumuman/*',
				'hakakses', 'hakakses/*',
				'jadwal', 'jadwal/*',
				'kategori', 'kategori/*',
				'matkul', 'matkul/*',
				'user', 'user/*',
				'status', 'status/*',
				'role', 'role/*',
			 
			]],
            'filterkonten' => [ 'except' => [
				'dashboard', 'dashboard/*',
                'front', 'front/*',
				'/', 
				'berita', 'berita/*',
				'pengumuman', 'pengumuman/*',
				'hakakses', 'hakakses/*',
				'jadwal', 'jadwal/*',
				'kategori', 'kategori/*',
				'matkul', 'matkul/*',
				'user', 'user/*',
				'status', 'status/*',
				'role', 'role/*',
			]],
            'filterdosen' => [ 'except' => [
				'dashboard', 'dashboard/*',
                'front', 'front/*',
				'/', 
				'berita', 'berita/*',
				'pengumuman', 'pengumuman/*',
				'hakakses', 'hakakses/*',
				'jadwal', 'jadwal/*',
				'kategori', 'kategori/*',
				'matkul', 'matkul/*',
				'user', 'user/*',
				'status', 'status/*',
				'role', 'role/*',
			]],
            
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/', 'profiles/']]
     *
     * @var array
     */
    public $filters = [];
}