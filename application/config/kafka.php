<?php

/*
 * @link https://github.com/edenhill/librdkafka/blob/master/CONFIGURATION.md
 */
return [
    'global' => [
        'group.id' => uniqid('group_id', true),
        'metadata.broker.list' => env('KAFKA_BROKERS'),
        'enable.auto.commit' => 'false',
    ],
    'topic' => [
        'auto.offset.reset' => 'beginning',
    ],
];
