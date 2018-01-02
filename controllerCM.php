<?php

echo "<link rel='stylesheet' type='text/css' href='css/form.css'>";


require_once ('ModelCM.php');

class controllerCM {

    function formatDollars($dollars) {
        $formatted = "$" . number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)), 2);
        return $dollars < 0 ? "({$formatted})" : "{$formatted}";
    }

    function createTitle($project) {

        $createTitle = new ModelContract();
        $rows        = $createTitle->getTitle($project);
        foreach ($rows as $value) {
            $result = $value['name'];
        }
        return $result;
    }

    function CreateDropdownList($project) {

//        $CM     = new ModelContract();
//        $rows   = $CM->getUnitNumbers($project);
//        $result = "<form action = '' method = 'post' >
//                <select name = 'units' class='style-select'><option value='' selected='selected'>";
//        $result = $result . "Select</option>";
//        
//        echo 'selected="selected"'; </option>;
//        
//      
//            foreach ($rows as $value) {
//        $result = $result . "<option  value='" . $value['unit_number'] . "'>" . $value['unit_number'] . "</option>";
//        }$result = $result . "</select><button class='buttonProjects'>Submit</button></form>";
//            return $result;
    }
    
    
    function updateUnitValues($units, $project){
        
        
        $CM = new ModelContract();
        $rows = $CM->UpdateNewSale($units, $project);
        var_dump($rows);
        
    }

    function SearchandGetInfo($units, $project) {
        $CM       = new ModelContract();
        $rowsUnit = $CM->getUnitInfobyUnit($units, $project);

        $result = "<table class='unitInfo'>
            <tr></tr><tr>
            <th class='th_table'>Model</th>
            <th class='th_table'>Sq Ft</th>
            <th class='th_table'>Purchase Price</th>
            <th class='th_table'>Status</th>
            
            </tr><tr><td height='5px;'></td></tr>";
        foreach ($rowsUnit as $row) {
            $model         = $row['model'];
            $sqft          = $row['sqft'];
            $purchasePrice = $row['initial_price'];
            $status        = $row['status'];

            $result = $result . "<tr ><td class='tdUnits'>" . $model . "</td><td class='tdUnits'>" . $sqft . "</td><td class='tdUnits'>" . $this->formatDollars($purchasePrice) .
                    "</td><td class='tdUnits'>" . $status .
                    "</td></tr><tr><td></td><tr></table>";
        }
        return $result;
    }

    function getUnitForm($units, $project) {
        $CM   = new ModelContract();
        $rows = $CM->getRepsNamesDropDownList($project);
        //the vlaues are pass with the search button!!! OK
       
        $result = "<form action=' ' method='post' enctype='text/plain'>
                                <label for='contract_date'>Date Signed:</label>
                                <input type='date' name='contract_date' required>
                                <label for='sales_rep'>Sales Representative:</label>
                                <select id='sales_rep' name='sales_rep' class='input-xlarge'>
                                    <option value='' selected='selected'>(please select)</option>";
        foreach ($rows as $value) {
            $result = $result . "<option  value='" . $value['NameRep'] . "'>" . $value['NameRep'] . "</option>";
        }$result = $result .
                "</select>
                                <label for='sale_price'>Purchase Price</label>
                                <input type='number' min='0.01' step='0.01' max='8000000' value='' id='sale_price' name='sale_price' placeholder='Purchase Price' required>

                                <label for='parking'>Parking</label>
                                <input type='number' id='parking' name='parking' placeholder='Parking' min='0' max='5' step='any' value='' required>
                                <label for='parking_value'>Parking Cost</label>
                                <input type='number' id='parking_value' name='parking_value' placeholder='Parking Cost' min='0.01' step='0.01' max='80000' required>
                                <label for='locker'>Locker</label>
                                <input type='number' id='locker' name='locker' placeholder='Locker' min='0' max='5' step='any' value='' required>
                                <label for='locker_value'>Locker Cost</label>
                                <input type='number' id='locker_value' name='locker_value' placeholder='Locker Cost' min='0.01' step='0.01' max='80000' required>
                                <select id='final_user' name='final_user' class='input-small'>
                                    <option value='' selected='selected'>(Select \"use\")</option>
                                    <option value='user'>User</option>
                                    <option value='investor'>Investor</option>
                                    </select>
                                <input type='reset' value='Clear'>
                                <input type='submit' name='unitInfo' value='Continue'>
                            </form>";
        return $result;
    }

    function getPurchaser1Form($units, $project) {

//the vlaues are pass with the search button!!! OK


        $result = "<form action=' ' method='post' enctype='text/plain'>
                                <label for='titlep1'>Title:</label>
                                <select id='titlep1' name='titlep1' class='input-small'>
                                    <option value='' selected='selected'>(Select title)</option>
                                    <option value='mr'>Mr.</option>
                                    <option value='ms'>Ms.</option>
                                    <option value='mrs'>Mrs.</option>
                                    <option value='dr'>Dr.</option>
                                    <option value='com'>Corp/Inc</option>
                                </select>
                                <label for='firstnamePr1'>Name</label>
                                <input type='text' id='firstnameP1' name='firstnameP1' placeholder='John' required>
                                <label for='lastNameP1'>Last Name</label>
                                <input type='text' id='lastNameP1' name='lastNameP1' placeholder='Smith' required>
                                <label for='addressP1Line1'>Address Line 1</label>
                                <input type='text' id='addressP1Line1' name='addressP1Line1' placeholder='address line 1' required>
                                <label for='addressP1Line1'>Address Line 1</label>
                                <input type='text' id='addressP1Line1' name='addressP1Line1' placeholder='address line 1'>
                                <label for='cityP1'>City / Town</label>
                                <input type='text' id='cityP1' name='cityP1' placeholder='city' required>
                                <label for='provinceP1'>State / Province / Region</label>
                                <input type='text' id='provinceP1' name='provinceP1' placeholder='state / province / region' required>
                                <label for='countryP1'>Country</label>
                                <select id='countryP1' name='countryP1' class='input-xlarge'>
                                    <option value='CA'>Canada</option>
                                    <option value='US'>United States</option>
                                    <option value='AF'>Afghanistan</option>
                                    <option value='AL'>Albania</option>
                                    <option value='DZ'>Algeria</option>
                                    <option value='AS'>American Samoa</option>
                                    <option value='AD'>Andorra</option>
                                    <option value='AO'>Angola</option>
                                    <option value='AI'>Anguilla</option>
                                    <option value='AQ'>Antarctica</option>
                                    <option value='AG'>Antigua and Barbuda</option>
                                    <option value='AR'>Argentina</option>
                                    <option value='AM'>Armenia</option>
                                    <option value='AW'>Aruba</option>
                                    <option value='AU'>Australia</option>
                                    <option value='AT'>Austria</option>
                                    <option value='AZ'>Azerbaijan</option>
                                    <option value='BS'>Bahamas</option>
                                    <option value='BH'>Bahrain</option>
                                    <option value='BD'>Bangladesh</option>
                                    <option value='BB'>Barbados</option>
                                    <option value='BY'>Belarus</option>
                                    <option value='BE'>Belgium</option>
                                    <option value='BZ'>Belize</option>
                                    <option value='BJ'>Benin</option>
                                    <option value='BM'>Bermuda</option>
                                    <option value='BT'>Bhutan</option>
                                    <option value='BO'>Bolivia</option>
                                    <option value='BA'>Bosnia and Herzegowina</option>
                                    <option value='BW'>Botswana</option>
                                    <option value='BV'>Bouvet Island</option>
                                    <option value='BR'>Brazil</option>
                                    <option value='IO'>British Indian Ocean Territory</option>
                                    <option value='BN'>Brunei Darussalam</option>
                                    <option value='BG'>Bulgaria</option>
                                    <option value='BF'>Burkina Faso</option>
                                    <option value='BI'>Burundi</option>
                                    <option value='KH'>Cambodia</option>
                                    <option value='CM'>Cameroon</option>
                                    <option value='CA'>Canada</option>
                                    <option value='CV'>Cape Verde</option>
                                    <option value='KY'>Cayman Islands</option>
                                    <option value='CF'>Central African Republic</option>
                                    <option value='TD'>Chad</option>
                                    <option value='CL'>Chile</option>
                                    <option value='CN'>China</option>
                                    <option value='CX'>Christmas Island</option>
                                    <option value='CC'>Cocos (Keeling) Islands</option>
                                    <option value='CO'>Colombia</option>
                                    <option value='KM'>Comoros</option>
                                    <option value='CG'>Congo</option>
                                    <option value='CD'>Congo, the Democratic Republic of the</option>
                                    <option value='CK'>Cook Islands</option>
                                    <option value='CR'>Costa Rica</option>
                                    <option value='CI'>Cote d'Ivoire</option>
                                    <option value='HR'>Croatia (Hrvatska)</option>
                                    <option value='CU'>Cuba</option>
                                    <option value='CY'>Cyprus</option>
                                    <option value='CZ'>Czech Republic</option>
                                    <option value='DK'>Denmark</option>
                                    <option value='DJ'>Djibouti</option>
                                    <option value='DM'>Dominica</option>
                                    <option value='DO'>Dominican Republic</option>
                                    <option value='TP'>East Timor</option>
                                    <option value='EC'>Ecuador</option>
                                    <option value='EG'>Egypt</option>
                                    <option value='SV'>El Salvador</option>
                                    <option value='GQ'>Equatorial Guinea</option>
                                    <option value='ER'>Eritrea</option>
                                    <option value='EE'>Estonia</option>
                                    <option value='ET'>Ethiopia</option>
                                    <option value='FK'>Falkland Islands (Malvinas)</option>
                                    <option value='FO'>Faroe Islands</option>
                                    <option value='FJ'>Fiji</option>
                                    <option value='FI'>Finland</option>
                                    <option value='FR'>France</option>
                                    <option value='FX'>France, Metropolitan</option>
                                    <option value='GF'>French Guiana</option>
                                    <option value='PF'>French Polynesia</option>
                                    <option value='TF'>French Southern Territories</option>
                                    <option value='GA'>Gabon</option>
                                    <option value='GM'>Gambia</option>
                                    <option value='GE'>Georgia</option>
                                    <option value='DE'>Germany</option>
                                    <option value='GH'>Ghana</option>
                                    <option value='GI'>Gibraltar</option>
                                    <option value='GR'>Greece</option>
                                    <option value='GL'>Greenland</option>
                                    <option value='GD'>Grenada</option>
                                    <option value='GP'>Guadeloupe</option>
                                    <option value='GU'>Guam</option>
                                    <option value='GT'>Guatemala</option>
                                    <option value='GN'>Guinea</option>
                                    <option value='GW'>Guinea-Bissau</option>
                                    <option value='GY'>Guyana</option>
                                    <option value='HT'>Haiti</option>
                                    <option value='HM'>Heard and Mc Donald Islands</option>
                                    <option value='VA'>Holy See (Vatican City State)</option>
                                    <option value='HN'>Honduras</option>
                                    <option value='HK'>Hong Kong</option>
                                    <option value='HU'>Hungary</option>
                                    <option value='IS'>Iceland</option>
                                    <option value='IN'>India</option>
                                    <option value='ID'>Indonesia</option>
                                    <option value='IR'>Iran (Islamic Republic of)</option>
                                    <option value='IQ'>Iraq</option>
                                    <option value='IE'>Ireland</option>
                                    <option value='IL'>Israel</option>
                                    <option value='IT'>Italy</option>
                                    <option value='JM'>Jamaica</option>
                                    <option value='JP'>Japan</option>
                                    <option value='JO'>Jordan</option>
                                    <option value='KZ'>Kazakhstan</option>
                                    <option value='KE'>Kenya</option>
                                    <option value='KI'>Kiribati</option>
                                    <option value='KP'>Korea, Democratic People's Republic of</option>
                                    <option value='KR'>Korea, Republic of</option>
                                    <option value='KW'>Kuwait</option>
                                    <option value='KG'>Kyrgyzstan</option>
                                    <option value='LA'>Lao People's Democratic Republic</option>
                                    <option value='LV'>Latvia</option>
                                    <option value='LB'>Lebanon</option>
                                    <option value='LS'>Lesotho</option>
                                    <option value='LR'>Liberia</option>
                                    <option value='LY'>Libyan Arab Jamahiriya</option>
                                    <option value='LI'>Liechtenstein</option>
                                    <option value='LT'>Lithuania</option>
                                    <option value='LU'>Luxembourg</option>
                                    <option value='MO'>Macau</option>
                                    <option value='MK'>Macedonia, The Former Yugoslav Republic of</option>
                                    <option value='MG'>Madagascar</option>
                                    <option value='MW'>Malawi</option>
                                    <option value='MY'>Malaysia</option>
                                    <option value='MV'>Maldives</option>
                                    <option value='ML'>Mali</option>
                                    <option value='MT'>Malta</option>
                                    <option value='MH'>Marshall Islands</option>
                                    <option value='MQ'>Martinique</option>
                                    <option value='MR'>Mauritania</option>
                                    <option value='MU'>Mauritius</option>
                                    <option value='YT'>Mayotte</option>
                                    <option value='MX'>Mexico</option>
                                    <option value='FM'>Micronesia, Federated States of</option>
                                    <option value='MD'>Moldova, Republic of</option>
                                    <option value='MC'>Monaco</option>
                                    <option value='MN'>Mongolia</option>
                                    <option value='MS'>Montserrat</option>
                                    <option value='MA'>Morocco</option>
                                    <option value='MZ'>Mozambique</option>
                                    <option value='MM'>Myanmar</option>
                                    <option value='NA'>Namibia</option>
                                    <option value='NR'>Nauru</option>
                                    <option value='NP'>Nepal</option>
                                    <option value='NL'>Netherlands</option>
                                    <option value='AN'>Netherlands Antilles</option>
                                    <option value='NC'>New Caledonia</option>
                                    <option value='NZ'>New Zealand</option>
                                    <option value='NI'>Nicaragua</option>
                                    <option value='NE'>Niger</option>
                                    <option value='NG'>Nigeria</option>
                                    <option value='NU'>Niue</option>
                                    <option value='NF'>Norfolk Island</option>
                                    <option value='MP'>Northern Mariana Islands</option>
                                    <option value='NO'>Norway</option>
                                    <option value='OM'>Oman</option>
                                    <option value='PK'>Pakistan</option>
                                    <option value='PW'>Palau</option>
                                    <option value='PA'>Panama</option>
                                    <option value='PG'>Papua New Guinea</option>
                                    <option value='PY'>Paraguay</option>
                                    <option value='PE'>Peru</option>
                                    <option value='PH'>Philippines</option>
                                    <option value='PN'>Pitcairn</option>
                                    <option value='PL'>Poland</option>
                                    <option value='PT'>Portugal</option>
                                    <option value='PR'>Puerto Rico</option>
                                    <option value='QA'>Qatar</option>
                                    <option value='RE'>Reunion</option>
                                    <option value='RO'>Romania</option>
                                    <option value='RU'>Russian Federation</option>
                                    <option value='RW'>Rwanda</option>
                                    <option value='KN'>Saint Kitts and Nevis</option>
                                    <option value='LC'>Saint LUCIA</option>
                                    <option value='VC'>Saint Vincent and the Grenadines</option>
                                    <option value='WS'>Samoa</option>
                                    <option value='SM'>San Marino</option>
                                    <option value='ST'>Sao Tome and Principe</option>
                                    <option value='SA'>Saudi Arabia</option>
                                    <option value='SG'>Singapore</option>
                                    <option value='ZA'>South Africa</option>
                                    <option value='ES'>Spain</option>
                                    <option value='SD'>Sudan</option>
                                    <option value='SZ'>Swaziland</option>
                                    <option value='SE'>Sweden</option>
                                    <option value='CH'>Switzerland</option>
                                    <option value='SY'>Syrian Arab Republic</option>
                                    <option value='TW'>Taiwan, Province of China</option>
                                    <option value='TZ'>Tanzania, United Republic of</option>
                                    <option value='TH'>Thailand</option>
                                    <option value='TG'>Togo</option>
                                    <option value='TO'>Tonga</option>
                                    <option value='TT'>Trinidad and Tobago</option>
                                    <option value='TN'>Tunisia</option>
                                    <option value='TR'>Turkey</option>
                                    <option value='UA'>Ukraine</option>
                                    <option value='AE'>United Arab Emirates</option>
                                    <option value='GB'>United Kingdom</option>
                                    <option value='US'>United States</option>
                                    <option value='UY'>Uruguay</option>
                                    <option value='UZ'>Uzbekistan</option>
                                    <option value='VE'>Venezuela</option>
                                    <option value='YU'>Yugoslavia</option>
                                    <option value='ZM'>Zambia</option>
                                    <option value='ZW'>Zimbabwe</option>
                                </select>
                                <label for='codePostalP1'>Postal Code</label>
                                <input type='text' id='codePostalP1' name='codePostalP1' placeholder='postal code or zip' required>
                                <label for='emailP1'>E-Mail</label>
                                <input type='email' id='emailP1' name='emailP1' placeholder='e-mail' required>
<label for='dobP1'>Date Of Birth:</label>
                                <input type='date' name='dobP1' required>
                                <label for='purchaser1IdNumber'>Purchaser 1 Id Number:</label>
                                <input type='text' id='purchaser1IdNumber' name='purchaser1IdNumber' required>
                                <label for='purchaser1IdJur'>Id Jurisdiction:</label>
                                <input type='text' id='purchaser1IdJur' name='purchaser1IdJur' required>
                                <label for='expDateP1'>Expiration Date:</label>
                                <input type='date' name='expDateP1' required>
                                <label for='P1Profession'>Profession:</label>
                                <input type='text' id='P1Profession' name='P1Profession' required>
                                <input type='submit' name='P1Info' value='Print documents'>
                                <input type='reset' value='Clear'>
                            </form>";
        return $result;
    }

    function getPurchaser2Form($units, $project) {

//the vlaues are pass with the search button!!! OK
       

        $result = "<form action=' ' method='post' enctype='text/plain'>
                                <label for='titlep2'>Title:</label>
                                <select id='titlep2' name='titlep2' class='input-small'>
                                    <option value='' selected='selected'>(Select title)</option>
                                    <option value='mr'>Mr.</option>
                                    <option value='ms'>Ms.</option>
                                    <option value='mrs'>Mrs.</option>
                                    <option value='dr'>Dr.</option>
                                    <option value='com'>Corp/Inc</option>
                                </select>
                                <label for='firstnamePr2'>Name</label>
                                <input type='text' id='firstnameP2' name='firstnameP2' placeholder='John' required>
                                <label for='lastNameP2'>Last Name</label>
                                <input type='text' id='lastNameP2' name='lastNameP2' placeholder='Smith' required>
                                <label for='addressP2Line1'>Address Line 1</label>
                                <input type='text' id='addressP2Line1' name='addressP2Line1' placeholder='address line 1' required>
                                <label for='addressP2Line2'>Address Line 2</label>
                                <input type='text' id='addressP2Line2' name='addressP2Line2' placeholder='address line 2'>
                                <label for='cityP2'>City / Town</label>
                                <input type='text' id='cityP2' name='cityP1' placeholder='city' required>
                                <label for='provinceP2'>State / Province / Region</label>
                                <input type='text' id='provinceP2' name='provinceP2' placeholder='state / province / region' required>
                                <label for='countryP2'>Country</label>
                                <select id='countryP2' name='countryP2' class='input-xlarge'>
                                    <option value='CA'>Canada</option>
                                    <option value='US'>United States</option>
                                    <option value='AF'>Afghanistan</option>
                                    <option value='AL'>Albania</option>
                                    <option value='DZ'>Algeria</option>
                                    <option value='AS'>American Samoa</option>
                                    <option value='AD'>Andorra</option>
                                    <option value='AO'>Angola</option>
                                    <option value='AI'>Anguilla</option>
                                    <option value='AQ'>Antarctica</option>
                                    <option value='AG'>Antigua and Barbuda</option>
                                    <option value='AR'>Argentina</option>
                                    <option value='AM'>Armenia</option>
                                    <option value='AW'>Aruba</option>
                                    <option value='AU'>Australia</option>
                                    <option value='AT'>Austria</option>
                                    <option value='AZ'>Azerbaijan</option>
                                    <option value='BS'>Bahamas</option>
                                    <option value='BH'>Bahrain</option>
                                    <option value='BD'>Bangladesh</option>
                                    <option value='BB'>Barbados</option>
                                    <option value='BY'>Belarus</option>
                                    <option value='BE'>Belgium</option>
                                    <option value='BZ'>Belize</option>
                                    <option value='BJ'>Benin</option>
                                    <option value='BM'>Bermuda</option>
                                    <option value='BT'>Bhutan</option>
                                    <option value='BO'>Bolivia</option>
                                    <option value='BA'>Bosnia and Herzegowina</option>
                                    <option value='BW'>Botswana</option>
                                    <option value='BV'>Bouvet Island</option>
                                    <option value='BR'>Brazil</option>
                                    <option value='IO'>British Indian Ocean Territory</option>
                                    <option value='BN'>Brunei Darussalam</option>
                                    <option value='BG'>Bulgaria</option>
                                    <option value='BF'>Burkina Faso</option>
                                    <option value='BI'>Burundi</option>
                                    <option value='KH'>Cambodia</option>
                                    <option value='CM'>Cameroon</option>
                                    <option value='CA'>Canada</option>
                                    <option value='CV'>Cape Verde</option>
                                    <option value='KY'>Cayman Islands</option>
                                    <option value='CF'>Central African Republic</option>
                                    <option value='TD'>Chad</option>
                                    <option value='CL'>Chile</option>
                                    <option value='CN'>China</option>
                                    <option value='CX'>Christmas Island</option>
                                    <option value='CC'>Cocos (Keeling) Islands</option>
                                    <option value='CO'>Colombia</option>
                                    <option value='KM'>Comoros</option>
                                    <option value='CG'>Congo</option>
                                    <option value='CD'>Congo, the Democratic Republic of the</option>
                                    <option value='CK'>Cook Islands</option>
                                    <option value='CR'>Costa Rica</option>
                                    <option value='CI'>Cote d'Ivoire</option>
                                    <option value='HR'>Croatia (Hrvatska)</option>
                                    <option value='CU'>Cuba</option>
                                    <option value='CY'>Cyprus</option>
                                    <option value='CZ'>Czech Republic</option>
                                    <option value='DK'>Denmark</option>
                                    <option value='DJ'>Djibouti</option>
                                    <option value='DM'>Dominica</option>
                                    <option value='DO'>Dominican Republic</option>
                                    <option value='TP'>East Timor</option>
                                    <option value='EC'>Ecuador</option>
                                    <option value='EG'>Egypt</option>
                                    <option value='SV'>El Salvador</option>
                                    <option value='GQ'>Equatorial Guinea</option>
                                    <option value='ER'>Eritrea</option>
                                    <option value='EE'>Estonia</option>
                                    <option value='ET'>Ethiopia</option>
                                    <option value='FK'>Falkland Islands (Malvinas)</option>
                                    <option value='FO'>Faroe Islands</option>
                                    <option value='FJ'>Fiji</option>
                                    <option value='FI'>Finland</option>
                                    <option value='FR'>France</option>
                                    <option value='FX'>France, Metropolitan</option>
                                    <option value='GF'>French Guiana</option>
                                    <option value='PF'>French Polynesia</option>
                                    <option value='TF'>French Southern Territories</option>
                                    <option value='GA'>Gabon</option>
                                    <option value='GM'>Gambia</option>
                                    <option value='GE'>Georgia</option>
                                    <option value='DE'>Germany</option>
                                    <option value='GH'>Ghana</option>
                                    <option value='GI'>Gibraltar</option>
                                    <option value='GR'>Greece</option>
                                    <option value='GL'>Greenland</option>
                                    <option value='GD'>Grenada</option>
                                    <option value='GP'>Guadeloupe</option>
                                    <option value='GU'>Guam</option>
                                    <option value='GT'>Guatemala</option>
                                    <option value='GN'>Guinea</option>
                                    <option value='GW'>Guinea-Bissau</option>
                                    <option value='GY'>Guyana</option>
                                    <option value='HT'>Haiti</option>
                                    <option value='HM'>Heard and Mc Donald Islands</option>
                                    <option value='VA'>Holy See (Vatican City State)</option>
                                    <option value='HN'>Honduras</option>
                                    <option value='HK'>Hong Kong</option>
                                    <option value='HU'>Hungary</option>
                                    <option value='IS'>Iceland</option>
                                    <option value='IN'>India</option>
                                    <option value='ID'>Indonesia</option>
                                    <option value='IR'>Iran (Islamic Republic of)</option>
                                    <option value='IQ'>Iraq</option>
                                    <option value='IE'>Ireland</option>
                                    <option value='IL'>Israel</option>
                                    <option value='IT'>Italy</option>
                                    <option value='JM'>Jamaica</option>
                                    <option value='JP'>Japan</option>
                                    <option value='JO'>Jordan</option>
                                    <option value='KZ'>Kazakhstan</option>
                                    <option value='KE'>Kenya</option>
                                    <option value='KI'>Kiribati</option>
                                    <option value='KP'>Korea, Democratic People's Republic of</option>
                                    <option value='KR'>Korea, Republic of</option>
                                    <option value='KW'>Kuwait</option>
                                    <option value='KG'>Kyrgyzstan</option>
                                    <option value='LA'>Lao People's Democratic Republic</option>
                                    <option value='LV'>Latvia</option>
                                    <option value='LB'>Lebanon</option>
                                    <option value='LS'>Lesotho</option>
                                    <option value='LR'>Liberia</option>
                                    <option value='LY'>Libyan Arab Jamahiriya</option>
                                    <option value='LI'>Liechtenstein</option>
                                    <option value='LT'>Lithuania</option>
                                    <option value='LU'>Luxembourg</option>
                                    <option value='MO'>Macau</option>
                                    <option value='MK'>Macedonia, The Former Yugoslav Republic of</option>
                                    <option value='MG'>Madagascar</option>
                                    <option value='MW'>Malawi</option>
                                    <option value='MY'>Malaysia</option>
                                    <option value='MV'>Maldives</option>
                                    <option value='ML'>Mali</option>
                                    <option value='MT'>Malta</option>
                                    <option value='MH'>Marshall Islands</option>
                                    <option value='MQ'>Martinique</option>
                                    <option value='MR'>Mauritania</option>
                                    <option value='MU'>Mauritius</option>
                                    <option value='YT'>Mayotte</option>
                                    <option value='MX'>Mexico</option>
                                    <option value='FM'>Micronesia, Federated States of</option>
                                    <option value='MD'>Moldova, Republic of</option>
                                    <option value='MC'>Monaco</option>
                                    <option value='MN'>Mongolia</option>
                                    <option value='MS'>Montserrat</option>
                                    <option value='MA'>Morocco</option>
                                    <option value='MZ'>Mozambique</option>
                                    <option value='MM'>Myanmar</option>
                                    <option value='NA'>Namibia</option>
                                    <option value='NR'>Nauru</option>
                                    <option value='NP'>Nepal</option>
                                    <option value='NL'>Netherlands</option>
                                    <option value='AN'>Netherlands Antilles</option>
                                    <option value='NC'>New Caledonia</option>
                                    <option value='NZ'>New Zealand</option>
                                    <option value='NI'>Nicaragua</option>
                                    <option value='NE'>Niger</option>
                                    <option value='NG'>Nigeria</option>
                                    <option value='NU'>Niue</option>
                                    <option value='NF'>Norfolk Island</option>
                                    <option value='MP'>Northern Mariana Islands</option>
                                    <option value='NO'>Norway</option>
                                    <option value='OM'>Oman</option>
                                    <option value='PK'>Pakistan</option>
                                    <option value='PW'>Palau</option>
                                    <option value='PA'>Panama</option>
                                    <option value='PG'>Papua New Guinea</option>
                                    <option value='PY'>Paraguay</option>
                                    <option value='PE'>Peru</option>
                                    <option value='PH'>Philippines</option>
                                    <option value='PN'>Pitcairn</option>
                                    <option value='PL'>Poland</option>
                                    <option value='PT'>Portugal</option>
                                    <option value='PR'>Puerto Rico</option>
                                    <option value='QA'>Qatar</option>
                                    <option value='RE'>Reunion</option>
                                    <option value='RO'>Romania</option>
                                    <option value='RU'>Russian Federation</option>
                                    <option value='RW'>Rwanda</option>
                                    <option value='KN'>Saint Kitts and Nevis</option>
                                    <option value='LC'>Saint LUCIA</option>
                                    <option value='VC'>Saint Vincent and the Grenadines</option>
                                    <option value='WS'>Samoa</option>
                                    <option value='SM'>San Marino</option>
                                    <option value='ST'>Sao Tome and Principe</option>
                                    <option value='SA'>Saudi Arabia</option>
                                    <option value='SG'>Singapore</option>
                                    <option value='ZA'>South Africa</option>
                                    <option value='ES'>Spain</option>
                                    <option value='SD'>Sudan</option>
                                    <option value='SZ'>Swaziland</option>
                                    <option value='SE'>Sweden</option>
                                    <option value='CH'>Switzerland</option>
                                    <option value='SY'>Syrian Arab Republic</option>
                                    <option value='TW'>Taiwan, Province of China</option>
                                    <option value='TZ'>Tanzania, United Republic of</option>
                                    <option value='TH'>Thailand</option>
                                    <option value='TG'>Togo</option>
                                    <option value='TO'>Tonga</option>
                                    <option value='TT'>Trinidad and Tobago</option>
                                    <option value='TN'>Tunisia</option>
                                    <option value='TR'>Turkey</option>
                                    <option value='UA'>Ukraine</option>
                                    <option value='AE'>United Arab Emirates</option>
                                    <option value='GB'>United Kingdom</option>
                                    <option value='US'>United States</option>
                                    <option value='UY'>Uruguay</option>
                                    <option value='UZ'>Uzbekistan</option>
                                    <option value='VE'>Venezuela</option>
                                    <option value='YU'>Yugoslavia</option>
                                    <option value='ZM'>Zambia</option>
                                    <option value='ZW'>Zimbabwe</option>
                                </select>
                                <label for='codePostalP2'>Postal Code</label>
                                <input type='text' id='codePostalP2' name='codePostalP2' placeholder='postal code or zip' required>
                                <label for='emailP2'>E-Mail</label>
                                <input type='email' id='emailP2' name='emailP2' placeholder='e-mail' required>
<label for='dobP2'>Date Of Birth:</label>
                                <input type='date' name='dobP2' required>
                                <label for='purchaser2IdNumber'>Purchaser 2 Id Number:</label>
                                <input type='text' id='purchaser2IdNumber' name='purchaser2IdNumber' required>
                                <label for='purchaser2IdJur'>Id Jurisdiction:</label>
                                <input type='text' id='purchaser2IdJur' name='purchaser2IdJur' required>
                                <label for='expDateP2'>Expiration Date:</label>
                                <input type='date' name='expDateP2' required>
                                <label for='P1Profession'>Profession:</label>
                                <input type='text' id='P2Profession' name='P2Profession' required> 
                                <input type='submit' name='P2Info' value='Print documents'>
                                <input type='reset' value='Clear'>
                            </form>";
        return $result;
    }

}
