<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Product Management</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url."admin";?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url."admin/products";?>">Product</a></li>
                <li class="breadcrumb-item active">Add New Product</li>
            </ol>
        </div>
    </div>
   
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <?=form_open_multipart('',array('class'=>'myForm'));?>
            <div class="card">
                
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Information
                    </h4>
                </div>
                <div class="card-body lang_bodieslisting ">

                    <?php $input = "title"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Title <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Title" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                            <div class="text-danger"><?php echo form_error($input);?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?php $input = "price"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Price <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="number" min="0" step="0.01" required name="<?php echo $input; ?>" class="form-control form-control-line" placeholder="Price" value="<?php if(set_value($input) != ''){ echo set_value($input);} ?>">
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php $input = "type"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Type <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="<?php echo $input; ?>" required class="form-control form-control-line">
                                        <option value="">--Select Type--</option>
                                        <option value="1">Testing</option>
                                        <option value="0">Shop Product</option>
                                    </select>
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $countries = array(
                            "Albania",
                            "Algeria",
                            "American Samoa",
                            "Andorra",
                            "Angola",
                            "Anguilla",
                            "Antarctica",
                            "Argentina",
                            "Armenia",
                            "Aruba",
                            "Australia",
                            "Austria",
                            "Azerbaijan",
                            "Bahamas",
                            "Bahrain",
                            "Bangladesh",
                            "Barbados",
                            "Belarus",
                            "Belgium",
                            "Belize",
                            "Benin",
                            "Bermuda",
                            "Bhutan",
                            "Bolivia",
                            "Botswana",
                            "Bouvet Island",
                            "Brazil",
                            "Brunei Darussalam",
                            "Bulgaria",
                            "Burkina Faso",
                            "Burundi",
                            "Cambodia",
                            "Cameroon",
                            "Canada",
                            "Cape Verde",
                            "Cayman Islands",
                            "Central African Republic",
                            "Chad",
                            "Chile",
                            "China",
                            "Christmas Island",
                            "Cocos (Keeling) Islands",
                            "Colombia",
                            "Comoros",
                            "Congo",
                            "Cook Islands",
                            "Costa Rica",
                            "Cote d'Ivoire",
                            "Croatia (Hrvatska)",
                            "Cuba",
                            "Cyprus",
                            "Czech Republic",
                            "Denmark",
                            "Djibouti",
                            "Dominica",
                            "Dominican Republic",
                            "Ecuador",
                            "Egypt",
                            "El Salvador",
                            "Equatorial Guinea",
                            "Eritrea",
                            "Estonia",
                            "Ethiopia",
                            "Falkland Islands (Malvinas)",
                            "Faroe Islands",
                            "Fiji",
                            "Finland",
                            "France",
                            "French Guiana",
                            "French Polynesia",
                            "Gabon",
                            "Gambia",
                            "Georgia",
                            "Germany",
                            "Ghana",
                            "Gibraltar",
                            "Greece",
                            "Greenland",
                            "Grenada",
                            "Guadeloupe",
                            "Guam",
                            "Guatemala",
                            "Guinea",
                            "Guinea-Bissau",
                            "Guyana",
                            "Haiti",
                            "Honduras",
                            "Hong Kong",
                            "Hungary",
                            "India",
                            "Indonesia",
                            "Iraq",
                            "Ireland",
                            "Israel",
                            "Italy",
                            "Jamaica",
                            "Japan",
                            "Jordan",
                            "Kazakhstan",
                            "Kenya",
                            "Kiribati",
                            "Korea, Republic of",
                            "Kuwait",
                            "Kyrgyzstan",
                            "Latvia",
                            "Lebanon",
                            "Lesotho",
                            "Liberia",
                            "Libyan Arab Jamahiriya",
                            "Liechtenstein",
                            "Lithuania",
                            "Luxembourg",
                            "Macau",
                            "Madagascar",
                            "Malawi",
                            "Malaysia",
                            "Maldives",
                            "Mali",
                            "Malta",
                            "Marshall Islands",
                            "Martinique",
                            "Mauritania",
                            "Mauritius",
                            "Mayotte",
                            "Mexico",
                            "Moldova, Republic of",
                            "Monaco",
                            "Mongolia",
                            "Montserrat",
                            "Morocco",
                            "Mozambique",
                            "Myanmar",
                            "Namibia",
                            "Nauru",
                            "Nepal",
                            "Netherlands",
                            "Netherlands Antilles",
                            "New Caledonia",
                            "New Zealand",
                            "Nicaragua",
                            "Niger",
                            "Nigeria",
                            "Niue",
                            "Norfolk Island",
                            "Northern Mariana Islands",
                            "Norway",
                            "Oman",
                            "Palau",
                            "Panama",
                            "Papua New Guinea",
                            "Paraguay",
                            "Peru",
                            "Philippines",
                            "Pitcairn",
                            "Poland",
                            "Portugal",
                            "Puerto Rico",
                            "Qatar",
                            "Reunion",
                            "Romania",
                            "Russian Federation",
                            "Rwanda",
                            "Saint Kitts and Nevis",
                            "Saint LUCIA",
                            "Samoa",
                            "San Marino",
                            "Sao Tome and Principe",
                            "Saudi Arabia",
                            "Senegal",
                            "Seychelles",
                            "Sierra Leone",
                            "Singapore",
                            "Slovakia (Slovak Republic)",
                            "Slovenia",
                            "Solomon Islands",
                            "Somalia",
                            "South Africa",
                            "Spain",
                            "Sri Lanka",
                            "St. Helena",
                            "St. Pierre and Miquelon",
                            "Sudan",
                            "Suriname",
                            "Swaziland",
                            "Sweden",
                            "Switzerland",
                            "Syrian Arab Republic",
                            "Taiwan, Province of China",
                            "Tajikistan",
                            "Tanzania, United Republic of",
                            "Thailand",
                            "Togo",
                            "Tokelau",
                            "Tonga",
                            "Trinidad and Tobago",
                            "Tunisia",
                            "Turkey",
                            "Turkmenistan",
                            "Turks and Caicos Islands",
                            "Tuvalu",
                            "Uganda",
                            "Ukraine",
                            "United Arab Emirates",
                            "United Kingdom",
                            "United States",
                            "Uruguay",
                            "Uzbekistan",
                            "Vanuatu",
                            "Venezuela",
                            "Viet Nam",
                            "Virgin Islands (British)",
                            "Virgin Islands (U.S.)",
                            "Wallis and Futuna Islands",
                            "Western Sahara",
                            "Yemen",
                            "Zambia",
                            "Zimbabwe",
                        );
                        ?>
                        <div class="col-md-6">
                            <?php $input = "country"; ?>
                            <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                                <label>Country <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <select name="<?php echo $input; ?>" class="form-control form-control-line">
                                        <option value="">--Select Country--</option>
                                        <?php
                                        foreach ($countries as $one_country) {
                                            ?>
                                            <option value="<?php echo $one_country; ?>"><?php echo $one_country; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $input = "description"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <label>Description <span class="text-danger">*</span></label>
                        <div class="controls">
                            <textarea rows="5" name="<?php echo $input; ?>" class="form-control form-control-line" required></textarea>
                            <div class="text-danger"><?php echo form_error($input);?></div>
                        </div>
                    </div>
                  
                    <?php $input = "image"; ?>
                    <div class="form-group <?=(form_error($input) !='')?'error':'';?>">
                        <div class="col-lg-12 col-md-12 nopad">
                            <div class="card">
                                <div class="">
                                    <label>Image</label>
                                    <input type="file" id="input-file-disable-remove" class="dropify" data-show-remove="false" name="<?php echo $input; ?>" data-default-file="" />
                                    <div class="text-danger"><?php echo form_error($input);?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>

            </div>
            <div class="mb-3">
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>
