<?php
return [
  'cryptKey' => '0ad1a8b057b2f1c0a19248f43611b01a',
  'hashSecretKey' => 'bad2d45a4bcdbe52648cba67b57efd9c',
  'apiSecretKeys' => (object) [],
  'database' => [
    'driver' => 'pdo_mysql',
    'host' => '127.0.0.1',
    'port' => '',
    'charset' => 'utf8mb4',
    'dbname' => 'admin_new_crm',
    'user' => 'admin_db',
    'password' => 'AlisTech9696!!!'
  ],
  'logger' => [
    'path' => 'data/logs/espo.log',
    'level' => 'DEBUG',
    'rotation' => true,
    'maxFileNumber' => 30,
    'printTrace' => true
  ],
  'passwordSalt' => '475745ccff475b59',
  'microtimeInternal' => 1734437056.207247,
  'webSocketMessager' => 'ZeroMQ',
  'webSocketPort' => '22335',
  'webSocketZeroMQSubscriberDsn' => 'tcp://127.0.0.1:22336',
  'webSocketZeroMQSubmissionDsn' => 'tcp://localhost:22336',
  'clientSecurityHeadersDisabled' => false,
  'clientCspDisabled' => false,
  'clientCspScriptSourceList' => [
    0 => 'https://maps.googleapis.com',
    1 => 'https://office.alis-is.com:9443'
  ],
  'actualDatabaseVersion' => '10.11.10',
  'defaultPermissions' => [
    'user' => 1107,
    'group' => 1107
  ],
  'instanceId' => '0824420a-e85d-4594-8590-8afbb34ef8b1',
  'adminUpgradeDisabled' => false,
  'authMaxFailedAttemptNumber' => 100,
  'smtpPassword' => '12345678987654321'
];
