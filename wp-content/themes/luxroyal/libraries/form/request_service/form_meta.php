<table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
    <tbody>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="broken"><?php _e('Broken', $this->name)?></label>
            </th>
            <td colspan="3">

                <input id="broken" name="broken" type="text" style="width: 95%" value="<?php echo esc_attr($item['broken'])?>"
                       size="50" class="code" placeholder="<?php _e('Your broken', $this->name)?>" >
            </td>

        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="attactment"><?php _e('attactment', $this->name)?></label>
            </th>
            <td colspan="3">

                <input id="attactment" name="attactment" type="file" style="width: 95%" 
                       size="50" class="code" placeholder="<?php _e('Your attactment', $this->name)?>" >
            </td>

        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="sn"><?php _e('Serial Number', $this->name)?></label>
            </th>
            <td colspan="3">

                <input id="sn" name="sn" type="text" style="width: 95%" value="<?php echo esc_attr($item['sn'])?>"
                       size="50" class="code" placeholder="<?php _e('Your Serial Number', $this->name)?>" >
            </td>

        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="fullname"><?php _e('Name', $this->name)?></label>
            </th>
            <td>
                <input id="fullname" name="fullname" type="text" style="width: 95%" value="<?php echo esc_attr($item['fullname'])?>"
                       size="50" class="code" placeholder="<?php _e('Your name', $this->name)?>"  >
            </td>
        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="email"><?php _e('Email', $this->name)?></label>
            </th>
            <td>
                <input id="email" name="email" type="email" style="width: 95%" value="<?php echo esc_attr($item['email'])?>"
                       size="50" class="code" placeholder="<?php _e('Your email', $this->name)?>" >
            </td>
        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="phone"><?php _e('Phone', $this->name)?></label>
            </th>
            <td>
                <input id="phone" name="phone" type="text" style="width: 95%" value="<?php echo esc_attr($item['phone'])?>"
                       size="50" class="code" placeholder="<?php _e('Your phone', $this->name)?>" >
            </td>
        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label><?php _e('Customer Address', $this->name)?></label>
            </th>
            <td>
                
                <table ng-controller="main_address"
                       ng-init="defind_val(
                                <? echo ($item['province'])? $item['province'] : 0 ?>,
                                <? echo ($item['district'])? $item['district'] : 0 ?>,
                                <? echo ($item['place'])? $item['place'] : 0 ?>,        
                                <? echo ($item['post_code'])? $item['post_code'] : 0 ?>
                                )">
                    <tr class="form-field">
                        <td valign="top" scope="row">
                            <label for="address"><?php _e('address', $this->name)?></label>
                        </td>
                        <td colspan="3">
                            
                            <input id="address" name="address" type="text" style="width: 95%" value="<?php echo esc_attr($item['address'])?>"
                                   size="50" class="code" placeholder="<?php _e('Your Address', $this->name)?>" >
                        </td>
                        
                    </tr>
                    <tr class="form-field">
                        <td valign="top" scope="row" style="width:20%">
                            <label for="province"><?php _e('Province', $this->name)?></label>
                        </td>
                        <td style="width:30%">
                            <select 
                                    name="province"  
                                    id="province" 
                                    style="width: 95%" 
                                    ng-model="province" 
                                    ng-init="get_obj()" 
                                    ng-change="get_obj('get_district')" 
                                    class="code" > 
                                <option value="0"><?php echo esc_attr(__('Select Provice')); ?></option> 
                                <option ng-repeat="item in provinces" ng-selected="item.id==province"  value="{{item.id}}">{{item.name}}</option>     
                            </select>
                        </td>
                        <td valign="top" scope="row">
                            <label for="district"><?php _e('District', $this->name)?></label>
                        </td>
                        <td>
                            <select 
                                    name="district"  
                                    id="district" 
                                    style="width: 95%" 
                                    ng-model="district" 
                                    ng-init="" 
                                    ng-change="get_obj('get_place')" 
                                    class="code" > 
                                <option value="0"><?php echo esc_attr(__('Select District')); ?></option> 
                                <option ng-repeat="item in districts" ng-selected="item.id==district"  value="{{item.id}}">{{item.name}}</option>     
                            </select>
                        </td>
                    </tr>
                    <tr class="form-field">
                        <td valign="top" scope="row">
                            <label for="place"><?php _e('Place', $this->name)?></label>
                        </td>
                        <td>
                            <select 
                                    name="place"  
                                    id="place" 
                                    style="width: 95%" 
                                    ng-model="place" 
                                    ng-init="" 
                                    ng-change="send_postcode(place)" 
                                    class="code" > 
                                <option value="0"><?php echo esc_attr(__('Select Place')); ?></option> 
                                <option ng-repeat="item in places" ng-selected="item.id==place"  value="{{item.id}}" >{{item.name}}</option>     
                            </select>
                  
                        </td>
                        <td valign="top" scope="row">
                            <label for="post_code"><?php _e('PostCode', $this->name)?></label>
                        </td>
                        <td>
                            <input id="post_code" name="post_code" ng-model="post_code" type="text" style="width: 65%" 
                                   size="50" class="code" placeholder="<?php _e('Your Post Code', $this->name)?>"  >
                        </td>
                    </tr>
                </table>
                
                
            </td>
        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="category"><?php _e('Category', $this->name)?></label>
            </th>
            <td>
                <select name="category_id"  ng-init="get_data()" ng-model="category" ng-change="get_data('get_product')" id="category" style="width: 95%" class="code" > 
                    <option value="0"><?php echo esc_attr(__('Select category')); ?></option> 
                    <option ng-repeat="item in category_items" ng-selected="item.term_id==category"  value="{{item.term_id}}">{{item.name}}</option>     
                </select>
            </td>
        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="product"><?php _e('Product', $this->name)?></label>
            </th>
            <td>
                <select name="product_id"  ng-model="product" ng-init=""  ng-change="get_data('get_series')" id="product" style="width: 95%" class="code" > 
                    <option value="0"><?php echo esc_attr(__('Select product')); ?></option> 
                    <option ng-repeat="item in product_items" ng-selected="item.term_id==product"  value="{{item.term_id}}">{{item.name}}</option>     
                </select>
            </td>
        </tr>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="series_id"><?php _e('Series', $this->name)?></label>
            </th>
            <td>
                <select name="series_id" ng-model="series"  id="series" style="width: 95%" class="code" >
                    <option value="0"><?php echo esc_attr(__('Select series')); ?></option> 
                    <option ng-repeat="item in series_items"  ng-selected="item.term_id==series"  value="{{item.term_id}}">{{item.name}}</option> 
                </select>
                
            </td>
        </tr>
         
        
    </tbody>
</table>
