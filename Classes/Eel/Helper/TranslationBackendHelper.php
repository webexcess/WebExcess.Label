<?php
namespace WebExcess\Label\Eel\Helper;

/*
 * This file is part of the WebExcess.Label package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\I18n\EelHelper\TranslationHelper as NeosTranslationHelper;
use Neos\Neos\Service\UserService;
use Neos\Flow\Exception;

class TranslationBackendHelper extends NeosTranslationHelper
{

    /**
     * @Flow\Inject
     * @var UserService
     */
    protected $userService;

    /**
     * @param string $id
     * @param null $originalLabel
     * @param array $arguments
     * @param string $source
     * @param null $package
     * @param null $quantity
     * @param null $locale
     * @return string
     * @throws Exception
     */
    public function translate($id, $originalLabel = null, array $arguments = [], $source = 'Main', $package = null, $quantity = null, $locale = null)
    {
        if ($locale === null) {
            $locale = $this->userService->getInterfaceLanguage();
        }

        if (
            $originalLabel === null &&
            $arguments === [] &&
            $source === 'Main' &&
            $package === null &&
            $quantity === null
        ) {
            return preg_match(parent::I18N_LABEL_ID_PATTERN, $id) === 1 ? $this->translateByShortHandString($id) : $id;
        }

        return parent::translateByExplicitlyPassedOrderedArguments($id, $originalLabel, $arguments, $source, $package, $quantity, $locale);
    }

    /**
     * All methods are considered safe
     *
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }

    /**
     * @param string $shortHandString
     * @return string
     * @throws Exception
     */
    protected function translateByShortHandString($shortHandString)
    {
        $locale = $this->userService->getInterfaceLanguage();

        $shortHandStringParts = explode(':', $shortHandString);
        if (count($shortHandStringParts) === 3) {
            list($package, $source, $id) = $shortHandStringParts;
            return $this->createTranslationParameterToken($id)
                ->package($package)
                ->source(str_replace('.', '/', $source))
                ->locale($locale)
                ->translate();
        }

        throw new \InvalidArgumentException(sprintf('The translation shorthand string "%s" has the wrong format', $shortHandString), 1436865829);
    }
}
