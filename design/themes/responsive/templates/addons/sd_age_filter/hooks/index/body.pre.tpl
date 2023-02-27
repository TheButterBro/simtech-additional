{if !isset($smarty.cookies.age_filter)}
    <div class="filter-fade">
        <div class="filter-wrapper cm-dialog-auto-size">
            <div class="buttons-container">{__("sd_age_filter.age_verification")}</div>
            <form name="my_form" action="{""|fn_url}" method="post">
                <div class="filter-body">
                    <div class="filter-title">
                        {__("sd_age_filter.warning", ["[setting_minimum_age]" => $setting_minimum_age])}
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="age_filter_age">{__("sd_age_filter.enter_age")}</label>
                        <div class="controls">
                            {include 
                                file="common/calendar.tpl" 
                                date_id="age_filter_birth_date" 
                                date_name="age_filter_data[birth_date]" 
                                date_val=$age_filter_data.birth_date|default:$smarty.const.TIME 
                                start_year=$settings.Company.company_start_year
                            }
                        </div>
                    </div>
                </div>
                
                <div class="buttons-container">
                    <div class="ty-float-right">
                        {include 
                            file="buttons/button.tpl" 
                            but_name="dispatch[age_filter.get_age]" 
                            but_text=__("submit") 
                            but_role="submit-link" 
                            but_meta="ty-btn__primary ty-btn__big cm-form-dialog-closer ty-btn"
                        }
                    </div>
                </div>

            </form>
        </div>
    </div>
{/if}

{if isset($smarty.cookies.age_filter) && !($smarty.cookies.age_filter === 'allowed')}
    <div class="filter-fade">
        <div class="filter-wrapper cm-dialog-auto-size">
            <div class="buttons-container">{__("sd_age_filter.age_verification")}</div>
            <div class="filter-body">
                <div class="filter-title">
                    {__("sd_age_filter.access_denied", ["[setting_minimum_age]" => $setting_minimum_age])}
                </div>
            </div>
        </div>
    </div>
{/if}

