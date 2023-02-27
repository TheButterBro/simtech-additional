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

defined('BOOTSTRAP') or die('Access denied');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    fn_trusted_vars(
        'age_filter_data'
    );

    if ($mode === 'get_age') {
        $data = !empty($_REQUEST['age_filter_data']) ? $_REQUEST['age_filter_data'] : [];

        $obt_setting_minimum_age = Registry::get('addons.sd_age_filter.minimal_age');
        $setting_minimum_age = is_numeric($obt_setting_minimum_age) 
            ? trim((int)$obt_setting_minimum_age)
            : 18;

        if (!empty($data['birth_date'])) {
            $access_result = fn_age_comparing($data['birth_date'], $setting_minimum_age);
            
            fn_set_cookie('age_filter', $access_result);
        }
    }

    return [CONTROLLER_STATUS_REDIRECT, 'index.php'];
}

?>