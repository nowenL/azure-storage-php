If you intend to contribute to the project, please make sure you've followed the instructions provided in the [Azure Projects Contribution Guidelines](http://azure.github.io/guidelines/).
## Project Setup
The Azure Storage development team uses [Eclipse for PHP Developers](http://www.eclipse.org/downloads/packages/eclipse-php-developers/mars2) so instructions will be tailored to that preference. However, any preferred IDE or other toolset should be usable.

### Install
* PHP 5.5, 5.6 or 7.0
* Eclipse for PHP Developers
* [Composer](https://getcomposer.org/) for php packages and tools management.
* [Apache Ant](http://ant.apache.org/manual/install.html) to drive build scripts.

### Development Environment Setup
To get the source code of the SDK via **git** just type:

```bash
git clone https://github.com/Azure/azure-storage-php.git
cd ./azure-storage-php
```

Run Composer to install all php package dependencies and tools:

```bash
composer install
```

## Tests

### Configuration
The test requires authenticated access of Azure, environment variable need to be configured on the dev box to enable test to get authorized properly:

```bash
Set AZURE_STORAGE_CONNECTION_STRING=DefaultEndpointsProtocol=https;AccountName=Account;AccountKey=Key
```

Please make sure there's no data inside the storage account used for test. Otherwise, test may fail because of the existing data.

### Running
You can use the following commands to run:

* All unit tests: ``ant phpunit`` or ``phpunit -c phpunit.xml.dist``
* All functional tests: ``ant phpunit-ft`` or ``phpunit -c phpunit.functional.dist.xml``
* One particular test case: ``phpunit -c phpunit.dist.xml --filter <case name>`` or ``phpunit -c phpunit.functional.dist.xml --filter <case name>``

### Testing Features
As you develop a feature, you'll need to write tests to ensure quality. Your changes should be covered by both unit tests and integration tests. You should also run existing tests related to your change to address any unexpected breaks.

## Pull Requests

### Guidelines
The following are the minimum requirements for any pull request that must be met before contributions can be accepted.
* Make sure you've signed the CLA before you start working on any change.
* Discuss any proposed contribution with the team via a GitHub issue **before** starting development.
* Code must be professional quality
	* You should strive to mimic the style with which we have written the library
	* Clean, well-commented, well-designed code
	* Try to limit the number of commits for a feature to 1-2. If you end up having too many we may ask you to squash your changes into fewer commits.
* [changelog.txt](changelog.txt) needs to be updated describing the new change
* Thoroughly test your feature

### Branching Policy
Non-breaking changes should be based on the dev branch whereas breaking changes should be based on the dev_breaking branch. Each breaking change should be recorded in [BreakingChanges.txt](BreakingChanges.txt).
We generally release any breaking changes in the next major version (e.g. 6.0, 7.0) and non-breaking changes in the next minor or major version (e.g. 6.0, 6.1, 6.2).

### Adding Features for All Platforms
We strive to release each new feature for each of our environments at the same time. Therefore, we ask that all contributions be written for both our Desktop SDK and our Window Runtime/CoreCLR SDK. This includes testing work for both platforms as well.

### Review Process
We expect all guidelines to be met before accepting a pull request. As such, we will work with you to address issues we find by leaving comments in your code. Please understand that it may take a few iterations before the code is accepted as we maintain high standards on code quality. Once we feel comfortable with a contribution, we will validate the change and accept the pull request.


Thank you for any contributions! Please let the team know if you have any questions or concerns about our contribution policy.