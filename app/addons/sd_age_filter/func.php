<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

use Tygh\Registry;

/**
 * Comparing users date with minimum date and getting access result
 *
 * @param string $date   Users birth date
 * @param int $minimal_age   Minimum age to view content
 *
 * @return string $result Access result
 */
function fn_age_comparing($date, $minimum_age = 18) {
    $result = '';
    $minimum_date = date('m/d/') . (date('Y') - $minimum_age);

    if (fn_parse_date($date) <= fn_parse_date($minimum_date)) {
        $result = 'allowed';
    } else {
        $result = 'denied';
    }

    return $result;
}

/**
 * Hook to pass minimum age variable from module settings to all templates
 */
function fn_sd_age_filter_init_templater ($view) {
    $obt_setting_minimum_age = Registry::get('addons.sd_age_filter.minimal_age');
    $setting_minimum_age = is_numeric($obt_setting_minimum_age) 
        ? trim((int)$obt_setting_minimum_age)
        : 18;

    $view->assign('setting_minimum_age', $setting_minimum_age);
}