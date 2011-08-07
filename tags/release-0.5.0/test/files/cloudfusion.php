<?php
/**
 * File: Configuration
 *  Stores your AWS account information. Add your account information, then rename this file to 'config.inc.php'.
 *
 * Version:
 *  2010.01.19
 *
 * Copyright:
 *  2006-2010 Ryan Parman, Foleeo, Inc., and contributors.
 *
 * License:
 *  Simplified BSD License - http://opensource.org/licenses/bsd-license.php
 *
 * See Also:
 *  CloudFusion - http://getcloudfusion.com
 */


/**
 * Constant: AWS_KEY
 *  Amazon Web Services Key. <http://aws-portal.amazon.com/gp/aws/developer/account/index.html?action=access-key>
 */
define('AWS_KEY', 'fake');

/**
 * Constant: AWS_SECRET_KEY
 *  Amazon Web Services Secret Key. <http://aws-portal.amazon.com/gp/aws/developer/account/index.html?action=access-key>
 */
define('AWS_SECRET_KEY', 'fake');

/**
 * Constant: AWS_ACCOUNT_ID
 *  Amazon Account ID without dashes. Used for identification with Amazon EC2. <http://aws-portal.amazon.com/gp/aws/developer/account/index.html?action=access-key>
 */
define('AWS_ACCOUNT_ID', 'fake');

/**
 * Constant: AWS_ASSOC_ID
 *  Amazon Associates ID. Used for crediting referrals via Amazon AAWS. <http://affiliate-program.amazon.com/gp/associates/join/>
 */
define('AWS_ASSOC_ID', 'fake');

/**
 * Constant: AWS_DEFAULT_LOCALE
 *  Locale that all PAS methods should default to. Can be overridden per-instance. Valid values are 'us', 'uk', 'ca', 'fr', 'de', or 'jp'.
 */
define('AWS_DEFAULT_LOCALE', 'us');

/**
 * Constant: AWS_CANONICAL_ID
 *  Your CanonicalUser ID. Used for setting access control settings in AmazonS3. Must be fetched from the server. Call <?php print_r($s3->get_canonical_user_id()); ?> to view.
 */
define('AWS_CANONICAL_ID', 'fake');

/**
 * Constant: AWS_CANONICAL_NAME
 *  Your CanonicalUser DisplayName. Used for setting access control settings in AmazonS3. Must be fetched from the server. Call <?php print_r($s3->get_canonical_user_id()); ?> to view.
 */
define('AWS_CANONICAL_NAME', 'fake');
