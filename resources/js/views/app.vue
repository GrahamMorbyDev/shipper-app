<template>
    <div>
        <nav-bar></nav-bar>
        <b-container class="mt-5">
            <b-row>
                <b-col class="mb-3">
                    <h2>Shippers Information <b-icon-arrow-up></b-icon-arrow-up></h2>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <shipper-table></shipper-table>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>
<script>
//Component imports
import navBar from "../components/navBar";
import shipperTable from "../components/shipperTable";

export default {
    components: {
        navBar,
        shipperTable,
    },
    computed: {},
    data() {
        return {
            message:'Hello World'
        }
    }
};
</script>
