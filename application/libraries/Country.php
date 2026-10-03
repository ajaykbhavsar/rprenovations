<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class Country {

	public  $country       =   '';
    public  $countryname      =   '';

	public function getCountry($params)
    {
		 $this->CI   =&  get_instance();
         $this->country =   $params['country'];
         $this->countryname  =  $params['countryname'];
		 $country = ucfirst($this->country);
        ?>
			<select name="<?=$this->countryname?>" id="<?=$this->countryname?>" class="required allselect">
						<option Value="">Select Country</option>
						<option Value="Albania" <? if($this->country == "Albania"){echo "selected";} ?>>Albania</option>
						<option Value="Algeria" <? if($this->country == "Algeria"){echo "selected";} ?>>Algeria</option>
						<option Value="American Samoa" <? if($this->country == "American Samoa"){echo "selected";} ?>>American Samoa</option>
						<option Value="Andorra" <? if($this->country == "Andorra"){echo "selected";} ?>>Andorra</option>
						<option Value="Angola" <? if($this->country == "Angola"){echo "selected";} ?>>Angola</option>
						<option Value="Anguilla" <? if($this->country == "Anguilla"){echo "selected";} ?>>Anguilla</option>
						<option Value="Antigua" <? if($this->country == "Antigua"){echo "selected";} ?>>Antigua</option>
						<option Value="Argentina" <? if($this->country == "Argentina"){echo "selected";} ?>>Argentina</option>
						<option Value="Armenia" <? if($this->country == "Armenia"){echo "selected";} ?>>Armenia</option>
						<option Value="Aruba" <? if($this->country == "Aruba"){echo "selected";} ?>>Aruba</option>
						<option Value="Australia" <? if($this->country == "Australia"){echo "selected";} ?>>Australia</option>
						<option Value="Austria" <? if($this->country == "Austria"){echo "selected";} ?>>Austria</option>
						<option Value="Azerbaijan" <? if($this->country == "Azerbaijan"){echo "selected";} ?>>Azerbaijan</option>
						<option Value="Bahamas" <? if($this->country == "Bahamas"){echo "selected";} ?>>Bahamas</option>
						<option Value="Bahrain" <? if($this->country == "Bahrain"){echo "selected";} ?>>Bahrain</option>
						<option Value="Bangladesh" <? if($this->country == "Bangladesh"){echo "selected";} ?>>Bangladesh</option>
						<option Value="Barbados" <? if($this->country == "Barbados"){echo "selected";} ?>>Barbados</option>
						<option Value="Belarus" <? if($this->country == "Belarus"){echo "selected";} ?>>Belarus</option>
						<option Value="Belgium" <? if($this->country == "Belgium"){echo "selected";} ?>>Belgium</option>
						<option Value="Belize" <? if($this->country == "Belize"){echo "selected";} ?>>Belize</option>
						<option Value="Benin" <? if($this->country == "Benin"){echo "selected";} ?>>Benin</option>
						<option Value="Bermuda" <? if($this->country == "Bermuda"){echo "selected";} ?>>Bermuda</option>
						<option Value="Bhutan" <? if($this->country == "Bhutan"){echo "selected";} ?>>Bhutan</option>
						<option Value="Bolivia" <? if($this->country == "Bolivia"){echo "selected";} ?>>Bolivia</option>
						<option Value="Bonaire" <? if($this->country == "Bonaire"){echo "selected";} ?>>Bonaire</option>
						<option Value="Bosnia and Herzegovina" <? if($this->country == "Bosnia and Herzegovina"){echo "selected";} ?>>Bosnia and Herzegovina</option>
						<option Value="Botswana" <? if($this->country == "Botswana"){echo "selected";} ?>>Botswana</option>
						<option Value="Brazil" <? if($this->country == "Brazil"){echo "selected";} ?>>Brazil</option>
						<option Value="Brunei" <? if($this->country == "Brunei"){echo "selected";} ?>>Brunei</option>
						<option Value="Bulgaria" <? if($this->country == "Bulgaria"){echo "selected";} ?>>Bulgaria</option>
						<option Value="Burkina Faso" <? if($this->country == "Burkina Faso"){echo "selected";} ?>>Burkina Faso</option>
						<option Value="Burma" <? if($this->country == "Burma"){echo "selected";} ?>>Burma</option>
						<option Value="Burundi" <? if($this->country == "Burundi"){echo "selected";} ?>>Burundi</option>
						<option Value="Cambodia" <? if($this->country == "Cambodia"){echo "selected";} ?>>Cambodia</option>
						<option Value="Cameroon" <? if($this->country == "Cameroon"){echo "selected";} ?>>Cameroon</option>
						<option Value="Canada" <? if($this->country == "Canada"){echo "selected";} ?>>Canada</option>
						<option Value="Canary Islands, The" <? if($this->country == "Canary Islands, The"){echo "selected";} ?>>Canary Islands, The</option>
						<option Value="Cape Verde" <? if($this->country == "Cape Verde"){echo "selected";} ?>>Cape Verde</option>
						<option Value="Caroline Islands" <? if($this->country == "Caroline Islands"){echo "selected";} ?>>Caroline Islands</option>
						<option Value="Cayman Islands" <? if($this->country == "Cayman Islands"){echo "selected";} ?>>Cayman Islands</option>
						<option Value="Centrafrique" <? if($this->country == "Centrafrique"){echo "selected";} ?>>Centrafrique</option>
						<option Value="Central African Republic" <? if($this->country == "Central African Republic"){echo "selected";} ?>>Central African Republic</option>
						<option Value="Chad" <? if($this->country == "Chad"){echo "selected";} ?>>Chad</option>
						<option Value="Channel islands" <? if($this->country == "Channel islands"){echo "selected";} ?>>Channel islands</option>
						<option Value="Chile" <? if($this->country == "Chile"){echo "selected";} ?>>Chile</option>
						<option Value="China, Peoples Republic" <? if($this->country == "China, Peoples Republic"){echo "selected";} ?>>China, People"s Republic</option>
						<option Value="Christmas Island" <? if($this->country == "Christmas Island"){echo "selected";} ?>>Christmas Island</option>
						<option Value="Chuuk Island" <? if($this->country == "Chuuk Island"){echo "selected";} ?>>Chuuk Island</option>
						<option Value="Cocos (Keeling) Islands" <? if($this->country == "Cocos (Keeling) Islands"){echo "selected";} ?>>Cocos (Keeling) Islands</option>
						<option Value="Colombia" <? if($this->country == "Colombia"){echo "selected";} ?>>Colombia</option>
						<option Value="Comoros" <? if($this->country == "Comoros"){echo "selected";} ?>>Comoros</option>
						<option Value="Congo" <? if($this->country == "Congo"){echo "selected";} ?>>Congo</option>
						<option Value="Congo, The Democratic Republic of" <? if($this->country == "Congo, The Democratic Republic of"){echo "selected";} ?>>Congo, The Democratic Republic of</option>
						<option Value="Cook Islands" <? if($this->country == "Cook Islands"){echo "selected";} ?>>Cook Islands</option>
						<option Value="Costa Rica" <? if($this->country == "Costa Rica"){echo "selected";} ?>>Costa Rica</option>
						<option Value="Cote dIvoire" <? if($this->country == "Cote dIvoire"){echo "selected";} ?>>Cote d"Ivoire</option>
						<option Value="Croatia" <? if($this->country == "Croatia"){echo "selected";} ?>>Croatia</option>
						<option Value="Cuba" <? if($this->country == "Cuba"){echo "selected";} ?>>Cuba</option>
						<option Value="Curacao" <? if($this->country == "Curacao"){echo "selected";} ?>>Curacao</option>
						<option Value="Cyprus" <? if($this->country == "Cyprus"){echo "selected";} ?>>Cyprus</option>
						<option Value="Czech Republic, The" <? if($this->country == "Czech Republic, The"){echo "selected";} ?>>Czech Republic, The</option>
						<option Value="Denmark" <? if($this->country == "Denmark"){echo "selected";} ?>>Denmark</option>
						<option Value="Djibouti" <? if($this->country == "Djibouti"){echo "selected";} ?>>Djibouti</option>
						<option Value="Dominica" <? if($this->country == "Dominica"){echo "selected";} ?>>Dominica</option>
						<option Value="Dominican Republic" <? if($this->country == "Dominican Republic"){echo "selected";} ?>>Dominican Republic</option>
						<option Value="Ebeye Island" <? if($this->country == "Ebeye Island"){echo "selected";} ?>>Ebeye Island</option>
						<option Value="Ecuador" <? if($this->country == "Ecuador"){echo "selected";} ?>>Ecuador</option>
						<option Value="Egypt" <? if($this->country == "Egypt"){echo "selected";} ?>>Egypt</option>
						<option Value="Eire" <? if($this->country == "Eire"){echo "selected";} ?>>Eire</option>
						<option Value="El Salvador" <? if($this->country == "El Salvador"){echo "selected";} ?>>El Salvador</option>
						<option Value="Equatorial Guinea" <? if($this->country == "Equatorial Guinea"){echo "selected";} ?>>Equatorial Guinea</option>
						<option Value="Eritrea" <? if($this->country == "Eritrea"){echo "selected";} ?>>Eritrea</option>
						<option Value="Estonia" <? if($this->country == "Estonia"){echo "selected";} ?>>Estonia</option>
						<option Value="Ethiopia" <? if($this->country == "Ethiopia"){echo "selected";} ?>>Ethiopia</option>
						<option Value="Falkland Islands" <? if($this->country == "Falkland Islands"){echo "selected";} ?>>Falkland Islands</option>
						<option Value="Faroe Islands" <? if($this->country == "Faroe Islands"){echo "selected";} ?>>Faroe Islands</option>
						<option Value="Federated States of Micronesia" <? if($this->country == "Federated States of Micronesia"){echo "selected";} ?>>Federated States of Micronesia</option>
						<option Value="Fiji" <? if($this->country == "Fiji"){echo "selected";} ?>>Fiji</option>
						<option Value="Finland" <? if($this->country == "Finland"){echo "selected";} ?>>Finland</option>
						<option Value="France" <? if($this->country == "France"){echo "selected";} ?>>France</option>
						<option Value="French Guiana" <? if($this->country == "French Guiana"){echo "selected";} ?>>French Guiana</option>
						<option Value="French Polynesia" <? if($this->country == "French Polynesia"){echo "selected";} ?>>French Polynesia</option>
						<option Value="Gabon" <? if($this->country == "Gabon"){echo "selected";} ?>>Gabon</option>
						<option Value="Gambia" <? if($this->country == "Gambia"){echo "selected";} ?>>Gambia</option>
						<option Value="Georgia" <? if($this->country == "Georgia"){echo "selected";} ?>>Georgia</option>
						<option Value="Germany" <? if($this->country == "Germany"){echo "selected";} ?>>Germany</option>
						<option Value="Ghana" <? if($this->country == "Ghana"){echo "selected";} ?>>Ghana</option>
						<option Value="Gibraltar" <? if($this->country == "Gibraltar"){echo "selected";} ?>>Gibraltar</option>
						<option Value="Greece" <? if($this->country == "Greece"){echo "selected";} ?>>Greece</option>
						<option Value="Greenland" <? if($this->country == "Greenland"){echo "selected";} ?>>Greenland</option>
						<option Value="Grenada" <? if($this->country == "Grenada"){echo "selected";} ?>>Grenada</option>
						<option Value="Guadeloupe" <? if($this->country == "Guadeloupe"){echo "selected";} ?>>Guadeloupe</option>
						<option Value="Guam" <? if($this->country == "Guam"){echo "selected";} ?>>Guam</option>
						<option Value="Guatemala" <? if($this->country == "Guatemala"){echo "selected";} ?>>Guatemala</option>
						<option Value="Guernsey" <? if($this->country == "Guernsey"){echo "selected";} ?>>Guernsey</option>
						<option Value="Guinea Republic" <? if($this->country == "Guinea Republic"){echo "selected";} ?>>Guinea Republic</option>
						<option Value="Guinea-Bissau" <? if($this->country == "Guinea-Bissau"){echo "selected";} ?>>Guinea-Bissau</option>
						<option Value="Guyana (British)" <? if($this->country == "Guyana (British)"){echo "selected";} ?>>Guyana (British)</option>
						<option Value="Haiti" <? if($this->country == "Haiti"){echo "selected";} ?>>Haiti</option>
						<option Value="Holland" <? if($this->country == "Holland"){echo "selected";} ?>>Holland</option>
						<option Value="Honduras" <? if($this->country == "Honduras"){echo "selected";} ?>>Honduras</option>
						<option Value="Hong Kong" <? if($this->country == "Hong Kong"){echo "selected";} ?>>Hong Kong</option>
						<option Value="Hungary" <? if($this->country == "Hungary"){echo "selected";} ?>>Hungary</option>
						<option Value="Iceland" <? if($this->country == "Iceland"){echo "selected";} ?>>Iceland</option>
						<option Value="India" <? if($this->country == "India"){echo "selected";} ?>>India</option>
						<option Value="Indonesia" <? if($this->country == "Indonesia"){echo "selected";} ?>>Indonesia</option>
						<option Value="Iran, Islamic Republic of" <? if($this->country == "Iran, Islamic Republic of"){echo "selected";} ?>>Iran, Islamic Republic of</option>
						<option Value="Iraq" <? if($this->country == "Iraq"){echo "selected";} ?>>Iraq</option>
						<option Value="Ireland, Northern" <? if($this->country == "Ireland, Northern"){echo "selected";} ?>>Ireland, Northern</option>
						<option Value="Ireland, Republic Of" <? if($this->country == "Ireland, Republic Of"){echo "selected";} ?>>Ireland, Republic Of</option>
						<option Value="Islas Malvinas" <? if($this->country == "Islas Malvinas"){echo "selected";} ?>>Islas Malvinas</option>
						<option Value="Israel" <? if($this->country == "Israel"){echo "selected";} ?>>Israel</option>
						<option Value="Italy" <? if($this->country == "Italy"){echo "selected";} ?>>Italy</option>
						<option Value="Ivory Coast" <? if($this->country == "Ivory Coast"){echo "selected";} ?>>Ivory Coast</option>
						<option Value="Jamaica" <? if($this->country == "Jamaica"){echo "selected";} ?>>Jamaica</option>
						<option Value="Japan" <? if($this->country == "Japan"){echo "selected";} ?>>Japan</option>
						<option Value="Jersey" <? if($this->country == "Jersey"){echo "selected";} ?>>Jersey</option>
						<option Value="Jordan" <? if($this->country == "Jordan"){echo "selected";} ?>>Jordan</option>
						<option Value="Kampuchea" <? if($this->country == "Kampuchea"){echo "selected";} ?>>Kampuchea</option>
						<option Value="Kazakhstan" <? if($this->country == "Kazakhstan"){echo "selected";} ?>>Kazakhstan</option>
						<option Value="Kenya" <? if($this->country == "Kenya"){echo "selected";} ?>>Kenya</option>
						<option Value="Kingdom of Cambodia" <? if($this->country == "Kingdom of Cambodia"){echo "selected";} ?>>Kingdom of Cambodia</option>
						<option Value="Kiribati" <? if($this->country == "Kiribati"){echo "selected";} ?>>Kiribati</option>
						<option Value="Korea, D.P.R Of" <? if($this->country == "Korea, D.P.R Of"){echo "selected";} ?>>Korea, D.P.R Of</option>
						<option Value="Korea, Republic Of" <? if($this->country == "Korea, Republic Of"){echo "selected";} ?>>Korea, Republic Of</option>
						<option Value="Koror Island" <? if($this->country == "Koror Island"){echo "selected";} ?>>Koror Island</option>
						<option Value="Kosrae Island" <? if($this->country == "Kosrae Island"){echo "selected";} ?>>Kosrae Island</option>
						<option Value="Kuwait" <? if($this->country == "Kuwait"){echo "selected";} ?>>Kuwait</option>
						<option Value="Kyrgyzstan" <? if($this->country == "Kyrgyzstan"){echo "selected";} ?>>Kyrgyzstan</option>
						<option Value="Lao People's Democratic Republic" <? if($this->country == "Lao People's Democratic Republic"){echo "selected";} ?>>Lao People's Democratic Republic</option>
						<option Value="Laos" <? if($this->country == "Laos"){echo "selected";} ?>>Laos</option>
						<option Value="Latvia" <? if($this->country == "Latvia"){echo "selected";} ?>>Latvia</option>
						<option Value="Lebanon" <? if($this->country == "Lebanon"){echo "selected";} ?>>Lebanon</option>
						<option Value="Lesotho" <? if($this->country == "Lesotho"){echo "selected";} ?>>Lesotho</option>
						<option Value="Liberia" <? if($this->country == "Liberia"){echo "selected";} ?>>Liberia</option>
						<option Value="Libya" <? if($this->country == "Libya"){echo "selected";} ?>>Libya</option>
						<option Value="Libya Arab Jamahiriya" <? if($this->country == "Libya Arab Jamahiriya"){echo "selected";} ?>>Libya Arab Jamahiriya</option>
						<option Value="Liechtenstein" <? if($this->country == "Liechtenstein"){echo "selected";} ?>>Liechtenstein</option>
						<option Value="Lithuania" <? if($this->country == "Lithuania"){echo "selected";} ?>>Lithuania</option>
						<option Value="Lord Howe Island" <? if($this->country == "Lord Howe Island"){echo "selected";} ?>>Lord Howe Island</option>
						<option Value="Luxembourg" <? if($this->country == "Luxembourg"){echo "selected";} ?>>Luxembourg</option>
						<option Value="Macau" <? if($this->country == "Macau"){echo "selected";} ?>>Macau</option>
						<option Value="Macedonia, Republic of (FYROM)" <? if($this->country == "Macedonia, Republic of (FYROM)"){echo "selected";} ?>>Macedonia, Republic of (FYROM)</option>
						<option Value="Madagascar" <? if($this->country == "Madagascar"){echo "selected";} ?>>Madagascar</option>
						<option Value="Majuro Island" <? if($this->country == "Majuro Island"){echo "selected";} ?>>Majuro Island</option>
						<option Value="Malawi" <? if($this->country == "Malawi"){echo "selected";} ?>>Malawi</option>
						<option Value="Malaysia" <? if($this->country == "Malaysia"){echo "selected";} ?>>Malaysia</option>
						<option Value="Maldives" <? if($this->country == "Maldives"){echo "selected";} ?>>Maldives</option>
						<option Value="Mali" <? if($this->country == "Mali"){echo "selected";} ?>>Mali</option>
						<option Value="Malta" <? if($this->country == "Malta"){echo "selected";} ?>>Malta</option>
						<option Value="Manua Island" <? if($this->country == "Manua Island"){echo "selected";} ?>>Manua Island</option>
						<option Value="Marshall Islands" <? if($this->country == "Marshall Islands"){echo "selected";} ?>>Marshall Islands</option>
						<option Value="Martinique" <? if($this->country == "Martinique"){echo "selected";} ?>>Martinique</option>
						<option Value="Mauritania" <? if($this->country == "Mauritania"){echo "selected";} ?>>Mauritania</option>
						<option Value="Mauritius" <? if($this->country == "Mauritius"){echo "selected";} ?>>Mauritius</option>
						<option Value="Mayotte" <? if($this->country == "Mayotte"){echo "selected";} ?>>Mayotte</option>
						<option Value="Mexico" <? if($this->country == "Mexico"){echo "selected";} ?>>Mexico</option>
						<option Value="Micronesia" <? if($this->country == "Micronesia"){echo "selected";} ?>>Micronesia</option>
						<option Value="Moldova, Republic Of" <? if($this->country == "Moldova, Republic Of"){echo "selected";} ?>>Moldova, Republic Of</option>
						<option Value="Monaco" <? if($this->country == "Monaco"){echo "selected";} ?>>Monaco</option>
						<option Value="Mongolia" <? if($this->country == "Mongolia"){echo "selected";} ?>>Mongolia</option>
						<option Value="Montserrat" <? if($this->country == "Montserrat"){echo "selected";} ?>>Montserrat</option>
						<option Value="Morocco" <? if($this->country == "Morocco"){echo "selected";} ?>>Morocco</option>
						<option Value="Mozambique" <? if($this->country == "Mozambique"){echo "selected";} ?>>Mozambique</option>
						<option Value="Myanmar" <? if($this->country == "Myanmar"){echo "selected";} ?>>Myanmar</option>
						<option Value="Namibia" <? if($this->country == "Namibia"){echo "selected";} ?>>Namibia</option>
						<option Value="Nauru, Republic Of" <? if($this->country == "Nauru, Republic Of"){echo "selected";} ?>>Nauru, Republic Of</option>
						<option Value="Nepal" <? if($this->country == "Nepal"){echo "selected";} ?>>Nepal</option>
						<option Value="Netherlands, The" <? if($this->country == "Netherlands, The"){echo "selected";} ?>>Netherlands, The</option>
						<option Value="Nevis" <? if($this->country == "Nevis"){echo "selected";} ?>>Nevis</option>
						<option Value="New Caledonia" <? if($this->country == "New Caledonia"){echo "selected";} ?>>New Caledonia</option>
						<option Value="New Zealand" <? if($this->country == "New Zealand"){echo "selected";} ?>>New Zealand</option>
						<option Value="Nicaragua" <? if($this->country == "Nicaragua"){echo "selected";} ?>>Nicaragua</option>
						<option Value="Niger" <? if($this->country == "Niger"){echo "selected";} ?>>Niger</option>
						<option Value="Nigeria" <? if($this->country == "Nigeria"){echo "selected";} ?>>Nigeria</option>
						<option Value="Niue" <? if($this->country == "Niue"){echo "selected";} ?>>Niue</option>
						<option Value="Norfolk Island" <? if($this->country == "Norfolk Island"){echo "selected";} ?>>Norfolk Island</option>
						<option Value="North Korea" <? if($this->country == "North Korea"){echo "selected";} ?>>North Korea</option>
						<option Value="Northern Ireland" <? if($this->country == "Northern Ireland"){echo "selected";} ?>>Northern Ireland</option>
						<option Value="Northern Marianas" <? if($this->country == "Northern Marianas"){echo "selected";} ?>>Northern Marianas</option>
						<option Value="Norway" <? if($this->country == "Norway"){echo "selected";} ?>>Norway</option>
						<option Value="Oman" <? if($this->country == "Oman"){echo "selected";} ?>>Oman</option>
						<option Value="Pakistan" <? if($this->country == "Pakistan"){echo "selected";} ?>>Pakistan</option>
						<option Value="Palau" <? if($this->country == "Palau"){echo "selected";} ?>>Palau</option>
						<option Value="Panama" <? if($this->country == "Panama"){echo "selected";} ?>>Panama</option>
						<option Value="Papua New Guinea" <? if($this->country == "Papua New Guinea"){echo "selected";} ?>>Papua New Guinea</option>
						<option Value="Paraguay" <? if($this->country == "Paraguay"){echo "selected";} ?>>Paraguay</option>
						<option Value="Peru" <? if($this->country == "Peru"){echo "selected";} ?>>Peru</option>
						<option Value="Philippines, The" <? if($this->country == "Philippines, The"){echo "selected";} ?>>Philippines, The</option>
						<option Value="Pohnpei Island" <? if($this->country == "Pohnpei Island"){echo "selected";} ?>>Pohnpei Island</option>
						<option Value="Poland" <? if($this->country == "Poland"){echo "selected";} ?>>Poland</option>
						<option Value="Portugal" <? if($this->country == "Portugal"){echo "selected";} ?>>Portugal</option>
						<option Value="Puerto Rico" <? if($this->country == "Puerto Rico"){echo "selected";} ?>>Puerto Rico</option>
						<option Value="Qatar" <? if($this->country == "Qatar"){echo "selected";} ?>>Qatar</option>
						<option Value="Reunion, Island Of" <? if($this->country == "Reunion, Island Of"){echo "selected";} ?>>Reunion, Island Of</option>
						<option Value="Romania" <? if($this->country == "Romania"){echo "selected";} ?>>Romania</option>
						<option Value="Rota Island" <? if($this->country == "Rota Island"){echo "selected";} ?>>Rota Island</option>
						<option Value="Russian Federation, The" <? if($this->country == "Russian Federation, The"){echo "selected";} ?>>Russian Federation, The</option>
						<option Value="Rwanda" <? if($this->country == "Rwanda"){echo "selected";} ?>>Rwanda</option>
						<option Value="Saipan" <? if($this->country == "Saipan"){echo "selected";} ?>>Saipan</option>
						<option Value="Samoa" <? if($this->country == "Samoa"){echo "selected";} ?>>Samoa</option>
						<option Value="Sao Tome and Principe" <? if($this->country == "Sao Tome and Principe"){echo "selected";} ?>>Sao Tome and Principe</option>
						<option Value="Saudi Arabia" <? if($this->country == "Saudi Arabia"){echo "selected";} ?>>Saudi Arabia</option>
						<option Value="Scotland" <? if($this->country == "Scotland"){echo "selected";} ?>>Scotland</option>
						<option Value="Senegal" <? if($this->country == "Senegal"){echo "selected";} ?>>Senegal</option>
						<option Value="Seychelles" <? if($this->country == "Seychelles"){echo "selected";} ?>>Seychelles</option>
						<option Value="Sierra Leone" <? if($this->country == "Sierra Leone"){echo "selected";} ?>>Sierra Leone</option>
						<option Value="Singapore" <? if($this->country == "Singapore"){echo "selected";} ?>>Singapore</option>
						<option Value="Slovakia" <? if($this->country == "Slovakia"){echo "selected";} ?>>Slovakia</option>
						<option Value="Slovenia" <? if($this->country == "Slovenia"){echo "selected";} ?>>Slovenia</option>
						<option Value="Solomon Islands" <? if($this->country == "Solomon Islands"){echo "selected";} ?>>Solomon Islands</option>
						<option Value="Somalia" <? if($this->country == "Somalia"){echo "selected";} ?>>Somalia</option>
						<option Value="Somaliland, Rep of (North Somalia)" <? if($this->country == "Somaliland, Rep of (North Somalia)"){echo "selected";} ?>>Somaliland, Rep of (North Somalia)</option>
						<option Value="South Africa" <? if($this->country == "South Africa"){echo "selected";} ?>>South Africa</option>
						<option Value="South Korea" <? if($this->country == "South Korea"){echo "selected";} ?>>South Korea</option>
						<option Value="Spain" <? if($this->country == "Spain"){echo "selected";} ?>>Spain</option>
						<option Value="Sri Lanka" <? if($this->country == "Sri Lanka"){echo "selected";} ?>>Sri Lanka</option>
						<option Value="St Croix" <? if($this->country == "St Croix"){echo "selected";} ?>>St Croix</option>
						<option Value="St John" <? if($this->country == "St John"){echo "selected";} ?>>St John</option>
						<option Value="St Thomas" <? if($this->country == "St Thomas"){echo "selected";} ?>>St Thomas</option>
						<option Value="St. Barthelemy" <? if($this->country == "St. Barthelemy"){echo "selected";} ?>>St. Barthelemy</option>
						<option Value="St. Eustatius" <? if($this->country == "St. Eustatius"){echo "selected";} ?>>St. Eustatius</option>
						<option Value="St. Kitts" <? if($this->country == "St. Kitts"){echo "selected";} ?>>St. Kitts</option>
						<option Value="St. Lucia" <? if($this->country == "St. Lucia"){echo "selected";} ?>>St. Lucia</option>
						<option Value="St. Maarten" <? if($this->country == "St. Maarten"){echo "selected";} ?>>St. Maarten</option>
						<option Value="St. Vincent" <? if($this->country == "St. Vincent"){echo "selected";} ?>>St. Vincent</option>
						<option Value="Sudan" <? if($this->country == "Sudan"){echo "selected";} ?>>Sudan</option>
						<option Value="Suriname" <? if($this->country == "Suriname"){echo "selected";} ?>>Suriname</option>
						<option Value="Swaziland" <? if($this->country == "Swaziland"){echo "selected";} ?>>Swaziland</option>
						<option Value="Sweden" <? if($this->country == "Sweden"){echo "selected";} ?>>Sweden</option>
						<option Value="Switzerland" <? if($this->country == "Switzerland"){echo "selected";} ?>>Switzerland</option>
						<option Value="Syria" <? if($this->country == "Syria"){echo "selected";} ?>>Syria</option>
						<option Value="Tahiti" <? if($this->country == "Tahiti"){echo "selected";} ?>>Tahiti</option>
						<option Value="Taiwan" <? if($this->country == "Taiwan"){echo "selected";} ?>>Taiwan</option>
						<option Value="Tajikistan" <? if($this->country == "Tajikistan"){echo "selected";} ?>>Tajikistan</option>
						<option Value="Tanzania" <? if($this->country == "Tanzania"){echo "selected";} ?>>Tanzania</option>
						<option Value="Thailand" <? if($this->country == "Thailand"){echo "selected";} ?>>Thailand</option>
						<option Value="Tinian Island" <? if($this->country == "Tinian Island"){echo "selected";} ?>>Tinian Island</option>
						<option Value="Togo" <? if($this->country == "Togo"){echo "selected";} ?>>Togo</option>
						<option Value="Tonga" <? if($this->country == "Tonga"){echo "selected";} ?>>Tonga</option>
						<option Value="Trinidad and Tobago" <? if($this->country == "Trinidad and Tobago"){echo "selected";} ?>>Trinidad and Tobago</option>
						<option Value="Turkey" <? if($this->country == "Turkey"){echo "selected";} ?>>Turkey</option>
						<option Value="Turkmenistan" <? if($this->country == "Turkmenistan"){echo "selected";} ?>>Turkmenistan</option>
						<option Value="Turks and Caicos Islands" <? if($this->country == "Turks and Caicos Islands"){echo "selected";} ?>>Turks and Caicos Islands</option>
						<option Value="Tutuila Island" <? if($this->country == "Tutuila Island"){echo "selected";} ?>>Tutuila Island</option>
						<option Value="Tuvalu" <? if($this->country == "Tuvalu"){echo "selected";} ?>>Tuvalu</option>
						<option Value="Uganda" <? if($this->country == "Uganda"){echo "selected";} ?>>Uganda</option>
						<option Value="Ukraine" <? if($this->country == "Ukraine"){echo "selected";} ?>>Ukraine</option>
						<option Value="Ulster" <? if($this->country == "Ulster"){echo "selected";} ?>>Ulster</option>
						<option Value="United Arab Emirates" <? if($this->country == "United Arab Emirates"){echo "selected";} ?>>United Arab Emirates</option>
						<option Value="United States Of America" <? if($this->country == "United States Of America"){echo "selected";} ?>>United States Of America</option>
						<option Value="United Kingdom" <? if($this->country == "United Kingdom"){echo "selected";} ?>>United Kingdom</option>
						<option Value="Uruguay" <? if($this->country == "Uruguay"){echo "selected";} ?>>Uruguay</option>
						<option Value="Uzbekistan" <? if($this->country == "Uzbekistan"){echo "selected";} ?>>Uzbekistan</option>
						<option Value="Vanuatu" <? if($this->country == "Vanuatu"){echo "selected";} ?>>Vanuatu</option>
						<option Value="Venezuela" <? if($this->country == "Venezuela"){echo "selected";} ?>>Venezuela</option>
						<option Value="Vietnam" <? if($this->country == "Vietnam"){echo "selected";} ?>>Vietnam</option>
						<option Value="Virgin Islands (British)" <? if($this->country == "Virgin Islands (British)"){echo "selected";} ?>>Virgin Islands (British)</option>
						<option Value="Virgin Islands (US)" <? if($this->country == "Virgin Islands (US)"){echo "selected";} ?>>Virgin Islands (US)</option>
						<option Value="Wales" <? if($this->country == "Wales"){echo "selected";} ?>>Wales</option>
						<option Value="Wallis and Futuna Islands" <? if($this->country == "Wallis and Futuna Islands"){echo "selected";} ?>>Wallis and Futuna Islands</option>
						<option Value="West Indies" <? if($this->country == "West Indies"){echo "selected";} ?>>West Indies</option>
						<option Value="estern Samoa" <? if($this->country == "estern Samoa"){echo "selected";} ?>>Western Samoa</option>
						<option Value="Yap Island" <? if($this->country == "Yap Island"){echo "selected";} ?>>Yap Island</option>
						<option Value="Yemen" <? if($this->country == "Yemen"){echo "selected";} ?>>Yemen</option>
						<option Value="Yugoslavia" <? if($this->country == "Yugoslavia"){echo "selected";} ?>>Yugoslavia</option>
						<option Value="Zaire" <? if($this->country == "Zaire"){echo "selected";} ?>>Zaire</option>
						<option Value="Zambia" <? if($this->country == "Zambia"){echo "selected";} ?>>Zambia</option>
						<option Value="Zimbabwe" <? if($this->country == "Zimbabwe"){echo "selected";} ?>>Zimbabwe</option>
					</select>
    <?}
}

/* End of file Someclass.php */