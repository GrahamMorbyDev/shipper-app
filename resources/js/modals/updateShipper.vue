<template>
    <b-modal id="update_shipper" title="Update shipper" :hide-footer="true">
        <b-form-group
            id="input-group-1"
            label="Shipper's name:"
            label-for="shippers_name"
        >
            <b-form-input
                id="shippers_name"
                v-model="shipper_name"
                type="text"
                required
            ></b-form-input>
        </b-form-group>

        <b-form-group
            id="input-group-2"
            label="Address Line 1:"
            label-for="address_1"
        >
            <b-form-input
                id="address_1"
                v-model="address_1"
                type="text"
                required
            ></b-form-input>
        </b-form-group>
        <b-form-group
            id="input-group-3"
            label="Address Line 2:"
            label-for="address_2"
        >
            <b-form-input
                id="address_2"
                v-model="address_2"
                type="text"
                required
            ></b-form-input>
        </b-form-group>
        <b-form-group
            id="input-group-4"
            label="Address Line 3:"
            label-for="address_3"
        >
            <b-form-input
                id="address_3"
                v-model="address_3"
                type="text"
            ></b-form-input>
        </b-form-group>
        <b-form-group
            id="input-group-5"
            label="Country:"
            label-for="country"
        >
            <b-form-select v-model="country" :options="options"></b-form-select>
        </b-form-group>
        <b-form-group
            id="input-group-6"
            label="Postcode:"
            label-for="post_code"
        >
            <b-form-input
                id="post_code"
                v-model="post_code"
                type="text"
            ></b-form-input>
        </b-form-group>
        <b-button variant="success" class="btn-block" @click="updateShipper()">Update</b-button>
    </b-modal>
</template>

<script>
export default {
    name: "updateShipper",
    props: ['shipper_id'],
    data() {
        return {
            shipper_name: null,
            address_1: null,
            address_2: null,
            address_3: null,
            country: null,
            post_code: null,
            options: [
                "Afghanistan",
                "Albania",
                "Algeria",
                "American Samoa",
                "Andorra",
                "Angola",
                "Anguilla",
                "Antarctica",
                "Antigua and Barbuda",
                "Argentina",
                "Armenia",
                "Aruba",
                "Australia",
                "Austria",
                "Azerbaijan",
                "Bahamas (the)",
                "Bahrain",
                "Bangladesh",
                "Barbados",
                "Belarus",
                "Belgium",
                "Belize",
                "Benin",
                "Bermuda",
                "Bhutan",
                "Bolivia (Plurinational State of)",
                "Bonaire, Sint Eustatius and Saba",
                "Bosnia and Herzegovina",
                "Botswana",
                "Bouvet Island",
                "Brazil",
                "British Indian Ocean Territory (the)",
                "Brunei Darussalam",
                "Bulgaria",
                "Burkina Faso",
                "Burundi",
                "Cabo Verde",
                "Cambodia",
                "Cameroon",
                "Canada",
                "Cayman Islands (the)",
                "Central African Republic (the)",
                "Chad",
                "Chile",
                "China",
                "Christmas Island",
                "Cocos (Keeling) Islands (the)",
                "Colombia",
                "Comoros (the)",
                "Congo (the Democratic Republic of the)",
                "Congo (the)",
                "Cook Islands (the)",
                "Costa Rica",
                "Croatia",
                "Cuba",
                "Curaçao",
                "Cyprus",
                "Czechia",
                "Côte d'Ivoire",
                "Denmark",
                "Djibouti",
                "Dominica",
                "Dominican Republic (the)",
                "Ecuador",
                "Egypt",
                "El Salvador",
                "Equatorial Guinea",
                "Eritrea",
                "Estonia",
                "Eswatini",
                "Ethiopia",
                "Falkland Islands (the) [Malvinas]",
                "Faroe Islands (the)",
                "Fiji",
                "Finland",
                "France",
                "French Guiana",
                "French Polynesia",
                "French Southern Territories (the)",
                "Gabon",
                "Gambia (the)",
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
                "Guernsey",
                "Guinea",
                "Guinea-Bissau",
                "Guyana",
                "Haiti",
                "Heard Island and McDonald Islands",
                "Holy See (the)",
                "Honduras",
                "Hong Kong",
                "Hungary",
                "Iceland",
                "India",
                "Indonesia",
                "Iran (Islamic Republic of)",
                "Iraq",
                "Ireland",
                "Isle of Man",
                "Israel",
                "Italy",
                "Jamaica",
                "Japan",
                "Jersey",
                "Jordan",
                "Kazakhstan",
                "Kenya",
                "Kiribati",
                "Korea (the Democratic People's Republic of)",
                "Korea (the Republic of)",
                "Kuwait",
                "Kyrgyzstan",
                "Lao People's Democratic Republic (the)",
                "Latvia",
                "Lebanon",
                "Lesotho",
                "Liberia",
                "Libya",
                "Liechtenstein",
                "Lithuania",
                "Luxembourg",
                "Macao",
                "Madagascar",
                "Malawi",
                "Malaysia",
                "Maldives",
                "Mali",
                "Malta",
                "Marshall Islands (the)",
                "Martinique",
                "Mauritania",
                "Mauritius",
                "Mayotte",
                "Mexico",
                "Micronesia (Federated States of)",
                "Moldova (the Republic of)",
                "Monaco",
                "Mongolia",
                "Montenegro",
                "Montserrat",
                "Morocco",
                "Mozambique",
                "Myanmar",
                "Namibia",
                "Nauru",
                "Nepal",
                "Netherlands (the)",
                "New Caledonia",
                "New Zealand",
                "Nicaragua",
                "Niger (the)",
                "Nigeria",
                "Niue",
                "Norfolk Island",
                "Northern Mariana Islands (the)",
                "Norway",
                "Oman",
                "Pakistan",
                "Palau",
                "Palestine, State of",
                "Panama",
                "Papua New Guinea",
                "Paraguay",
                "Peru",
                "Philippines (the)",
                "Pitcairn",
                "Poland",
                "Portugal",
                "Puerto Rico",
                "Qatar",
                "Republic of North Macedonia",
                "Romania",
                "Russian Federation (the)",
                "Rwanda",
                "Réunion",
                "Saint Barthélemy",
                "Saint Helena, Ascension and Tristan da Cunha",
                "Saint Kitts and Nevis",
                "Saint Lucia",
                "Saint Martin (French part)",
                "Saint Pierre and Miquelon",
                "Saint Vincent and the Grenadines",
                "Samoa",
                "San Marino",
                "Sao Tome and Principe",
                "Saudi Arabia",
                "Senegal",
                "Serbia",
                "Seychelles",
                "Sierra Leone",
                "Singapore",
                "Sint Maarten (Dutch part)",
                "Slovakia",
                "Slovenia",
                "Solomon Islands",
                "Somalia",
                "South Africa",
                "South Georgia and the South Sandwich Islands",
                "South Sudan",
                "Spain",
                "Sri Lanka",
                "Sudan (the)",
                "Suriname",
                "Svalbard and Jan Mayen",
                "Sweden",
                "Switzerland",
                "Syrian Arab Republic",
                "Taiwan",
                "Tajikistan",
                "Tanzania, United Republic of",
                "Thailand",
                "Timor-Leste",
                "Togo",
                "Tokelau",
                "Tonga",
                "Trinidad and Tobago",
                "Tunisia",
                "Turkey",
                "Turkmenistan",
                "Turks and Caicos Islands (the)",
                "Tuvalu",
                "Uganda",
                "Ukraine",
                "United Arab Emirates (the)",
                "United Kingdom",
                "United States Minor Outlying Islands (the)",
                "United States of America (the)",
                "Uruguay",
                "Uzbekistan",
                "Vanuatu",
                "Venezuela (Bolivarian Republic of)",
                "Viet Nam",
                "Virgin Islands (British)",
                "Virgin Islands (U.S.)",
                "Wallis and Futuna",
                "Western Sahara",
                "Yemen",
                "Zambia",
                "Zimbabwe",
                "Åland Islands"
            ],
            create_message: null
        }
    },
    methods: {
        fetchShipper() {
            this.axios.get('api/shippers/get', {
                params: {
                    id: this.shipper_id
                }
            }).then(response => {
                this.shipper_name = response.data.data.shippers_name;
                this.address_1 = response.data.data.address_1;
                this.address_2 = response.data.data.address_2;
                this.address_3 = response.data.data.address_3;
                this.country   = response.data.data.country;
                this.post_code = response.data.data.post_code;
            }).catch(e => {
                console.log(e);
            });
        },
        updateShipper() {
            const data = {
                id: this.shipper_id,
                shippers_name: this.shipper_name,
                address_1: this.address_1,
                address_2: this.address_2,
                address_3: this.address_3,
                country: this.country,
                post_code: this.post_code,
            };
            this.axios.post('api/shippers/update', data).then(response => {
                this.$emit('updated');
                this.$bvModal.hide('update_shipper');
            }).catch(e => {
                console.error(e);
            })
        }
    },
    watch: {
        shipper_id: function(newVal, oldVal) { // watch it
            this.fetchShipper();
        }
    }
}
</script>

<style scoped>

</style>
