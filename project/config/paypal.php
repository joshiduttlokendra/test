<?php
return [
    'client_id' => 'AZdczrtr6aQYNlXXysP1van-GuRXwma_5yYeNAzYH-s_5zyTSyLhd1iOiNijusvf0tXnwaiazZO8UvlC',
	'secret' => 'ECACkfm8kdqiVRWSJTEQ9hbrlOpnRUN9Ym1Ma6jFnhpWpXO2x9tUqSk0cpLF3JmZFM28t1mEd3uZWgco',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
