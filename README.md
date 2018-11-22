# Powermail Encryption Plugin for TYPO3

has been tested with TYPO3 8.7 only (sorry haven't had more time yet). 

## Install

1) install extension
2) set encryption key in extension manager settings (please update key, dont use same as example key)
3) include typoscript template (please make sure that none of your own finishers override plugin.tx_powermail.settings.setup.finishers.14 - if so adjust accordingly)
4) test your powermail form and check table tx_powermailencryption_domain_model_data if the data is correctly insert (check in backend to see the data)
5) If 4 is working properly and the following line to your typoscript setup to prevent powermail from storing your powermail answers in database:
```
plugin.tx_powermail.settings.setup.db.enable = 0
```

## Limitations

none so far. please let me know once you'll find some

Based on the symfony project: https://github.com/Resomedia/DoctrineEncryptBundle/blob/master/Encryptors/Encryptor.php