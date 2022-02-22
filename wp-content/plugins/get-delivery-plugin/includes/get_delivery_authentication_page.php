<?php

function get_delivery_home_page_markup()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    global $wpdb;
    $get_delivery_keys_api_table_name = $wpdb->prefix . "get_delivery_api_keys";

    $get_delivery_test_keys = $wpdb->get_row("SELECT * FROM $get_delivery_keys_api_table_name WHERE Env_type = 'test' ");
    $get_delivery_production_keys = $wpdb->get_row("SELECT * FROM $get_delivery_keys_api_table_name WHERE Env_type = 'production' ");
?>
    <div class="wrap get-delivery-body">
        <section class="get-delivery-header">
            <h1 class="get-delivery-page-title">API Keys</h1>
            <div class="get-delivery-user-menu">
                <div class="get-delivery-logo">
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.7953 38.9531C44.0393 36.2533 45.5999 33.0527 46.3453 29.6221C47.0907 26.1916 46.9989 22.632 46.0776 19.2444C45.1564 15.8568 43.4327 12.741 41.0526 10.1604C38.6724 7.57987 35.7058 5.61054 32.4035 4.41902C29.1013 3.22751 25.5607 2.84886 22.0812 3.31511C18.6017 3.78136 15.2857 5.07879 12.4136 7.09765C9.54159 9.11651 7.19804 11.7974 5.58124 14.9135C3.96443 18.0297 3.12193 21.4894 3.12501 25C3.12619 30.1034 4.92461 35.0434 8.2047 38.9531L8.17345 38.9797C8.28282 39.1109 8.40782 39.2234 8.52032 39.3531C8.66095 39.514 8.81251 39.6656 8.95782 39.8219C9.39532 40.2969 9.84532 40.7531 10.3172 41.1812C10.4609 41.3125 10.6094 41.4344 10.7547 41.5594C11.2547 41.9906 11.7688 42.4 12.3016 42.7812C12.3703 42.8281 12.4328 42.889 12.5016 42.9375V42.9187C16.1611 45.494 20.5267 46.8761 25.0016 46.8761C29.4764 46.8761 33.842 45.494 37.5016 42.9187V42.9375C37.5703 42.889 37.6313 42.8281 37.7016 42.7812C38.2328 42.3984 38.7484 41.9906 39.2484 41.5594C39.3938 41.4344 39.5422 41.3109 39.6859 41.1812C40.1578 40.7515 40.6078 40.2969 41.0453 39.8219C41.1906 39.6656 41.3406 39.514 41.4828 39.3531C41.5938 39.2234 41.7203 39.1109 41.8297 38.9781L41.7953 38.9531ZM25 12.5C26.3907 12.5 27.7501 12.9124 28.9064 13.685C30.0626 14.4576 30.9639 15.5557 31.496 16.8405C32.0282 18.1253 32.1675 19.539 31.8962 20.903C31.6249 22.2669 30.9552 23.5197 29.9719 24.5031C28.9885 25.4864 27.7357 26.1561 26.3717 26.4274C25.0078 26.6987 23.5941 26.5594 22.3093 26.0273C21.0245 25.4951 19.9263 24.5939 19.1537 23.4376C18.3811 22.2813 17.9688 20.9219 17.9688 19.5312C17.9688 17.6664 18.7095 15.878 20.0282 14.5594C21.3468 13.2408 23.1352 12.5 25 12.5ZM12.5109 38.9531C12.5381 36.9015 13.3718 34.943 14.8318 33.5014C16.2918 32.0599 18.2607 31.251 20.3125 31.25H29.6875C31.7393 31.251 33.7082 32.0599 35.1682 33.5014C36.6282 34.943 37.462 36.9015 37.4891 38.9531C34.0623 42.0411 29.6129 43.7501 25 43.7501C20.3871 43.7501 15.9378 42.0411 12.5109 38.9531Z" fill="#201E1E"></path>
                    </svg>
                </div>
                <ul class="">
                    <li class="get-delivery-user-menu-item">menu-item-1</li>
                    <li class="get-delivery-user-menu-item">menu-item-2</li>
                    <li class="get-delivery-user-menu-item">menu-item-3</li>
                </ul>
            </div>
        </section>
        <section class="get-delivery-auth-body">
            <div class="get-delivery-auth-header">
                <h2 class="get-delivery-auth-header-title"> Select Mode</h2>
                <ul class="get-delivery-auth-header-menu">
                    <li class="">
                        <h2 id="get-delivery-auth-header-test" class=" get-delivery-auth-header-menu-active">Test</h2>
                    </li>
                    <li class="">
                        <h2 id="get-delivery-auth-header-production">Production</h2>
                    </li>
                </ul>
            </div>
            <div id="get-delivery-test-keys-form" class="get-delivery-auth-form">
                <div class="get-delivery-form-group">
                    <label for="get-delivery-api-keys" class="get-delivery-form-group-label">Test API Key</label>
                    <div class="get-delivery-form-group-input">
                        <input id="get-delivery-api-keys" class="" value="<?php echo $get_delivery_test_keys->Get_Delivery_API_Key ?>" placeholder="Input API key..." type="password">
                        <div class="show-input-details">
                            <svg id="show-input-details-hidden" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
                                <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"></path>
                            </svg>
                            <svg id="show-input-details-shown" style="display: none;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="get-delivery-form-group">
                    <label for="get-delivery-webhook-url" class="get-delivery-form-group-label">Test Webhook URL</label>
                    <div class="get-delivery-form-group-input">
                        <input id="get-delivery-webhoook-url" class="" value="<?php echo $get_delivery_test_keys->Get_Delivery_Webhook_Url ?>" placeholder="Input webhook url" type="text">
                        <span class=""></span>
                    </div>

                </div>
                <button id="get-delivery-submit-auth-button" class="get-delivery-submit-button">Submit</button>
            </div>

            <div id="get-delivery-production-keys-form" style="display: none;" class="get-delivery-auth-form">
                <div class="get-delivery-form-group">
                    <label for="get-delivery-api-keys" class="get-delivery-form-group-label">Test API Key</label>
                    <div class="get-delivery-form-group-input">
                        <input id="get-delivery-api-keys" class="" value="<?php echo $get_delivery_production_keys->Get_Delivery_API_Key ?>" placeholder="Input API key..." type="password">
                        <div class="show-input-details">
                            <svg id="show-input-details-hidden" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
                                <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"></path>
                            </svg>
                            <svg id="show-input-details-shown" style="display: none;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="get-delivery-form-group">
                <label for="get-delivery-webhook-url" class="get-delivery-form-group-label">Test Webhook URL</label>
                <div class="get-delivery-form-group-input">
                    <input id="get-delivery-webhoook-url" class="" value="<?php echo $get_delivery_production_keys->Get_Delivery_Webhook_Url ?>" placeholder="Input webhook url" type="text">
                    <span class=""></span>
                </div>

            </div>
            <button id="get-delivery-submit-auth-button" class="get-delivery-submit-button">Submit</button>
    </div>
    </section>

    </div>
<?php
}
?>