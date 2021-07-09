<template>
    <div>
        <b-table striped hover responsive bordered :items="shippers" :fields="fields">
            <template v-slot:cell(contacts)="row">
                <b-button
                    size="md"
                    @click="showContacts(row.item.id)"
                    class="mr-1 btn btn-info"
                    v-b-tooltip.hover title="View contacts"
                >
                    <b-icon-file-earmark-person></b-icon-file-earmark-person>
                </b-button>
                <b-button
                    size="md"
                    @click="addContact(row.item.id)"
                    class="mr-1 btn btn-secondary"
                    v-b-tooltip.hover title="Add contact"
                >
                    <b-icon-plus-circle></b-icon-plus-circle>
                </b-button>
            </template>
            <template v-slot:cell(update)="row">
                <b-button
                    size="md"
                    @click="update(row.item.id)"
                    class="mr-1 btn btn-success"
                    v-b-tooltip.hover title="Update shipper"
                >
                    <b-icon-arrow-up></b-icon-arrow-up>
                </b-button>
            </template>
        </b-table>
        <b-row class="mt-1">
            <b-col class="text-right">
                <b-button variant="success" @click="$bvModal.show('create_shipper')">Create shipper</b-button>
            </b-col>
        </b-row>
        <update-shipper :shipper_id="shipper_id" @updated="fetchShippers"></update-shipper>
        <add-contact    :shipper_id="shipper_id"></add-contact>
        <add-shipper @newShipper="fetchShippers"></add-shipper>
        <b-table v-show="contacts != null" class="mt-5" striped hover responsive bordered :items="contacts" :fields="contact_fields" :tbody-tr-class="rowClass">

            <template v-slot:table-caption
            >Green = Primary
            </template>        </b-table>
        <b-row>
            <b-col v-show="contacts != null" class="text-right">
                <b-button variant="danger" @click="closeContacts">Close Contacts</b-button>
            </b-col>
        </b-row>
    </div>
</template>

<script>
import updateShipper from "../modals/updateShipper";
import addContact from "../modals/addContact";
import addShipper from "../modals/addShipper";
export default {
    name:  "Shippers-Table",
    components:{
        updateShipper,
        addContact,
        addShipper
    },
    data() {
        return {
            contact_fields: ['contact_name', 'contact_number'],
            fields: ['id', 'shippers_name', 'address_1', 'address_2', 'address_3', 'post_code','contacts', 'update'],
            shippers: [],
            shipper_id: null,
            contacts: null
        }
    },
    methods: {
        fetchShippers() {
            this.axios.get('api/shippers/get').then(response => {
               this.shippers = response.data.data;
            }).catch(e => {
                console.log(e);
            });
        },
        fetchContacts() {
            this.axios.get('api/contacts/get', {
                params: {
                    shipper_id: this.shipper_id
                }
            }).then(response => {
                this.contacts = response.data.data;
            }).catch(e => {
                console.log(e);
            });
        },
        update(id) {
            console.warn('Updating Shipper');
            this.shipper_id = id;
            this.$bvModal.show('update_shipper');
        },
        addContact(id) {
            console.warn('Adding Contacts');
            this.shipper_id = id;
            this.$bvModal.show('create_contact');
        },
        showContacts(id) {
            console.warn('Showing Contacts');
            this.shipper_id = id;
            this.fetchContacts();
        },
        closeContacts() {
            this.contacts = null;
        },
        rowClass(item, type) {
            if (!item || type !== 'row') return;
            if (item.is_primary === 0) return 'table-none';
            if (item.is_primary === 1) return 'table-success';
        },
    },
    created() {
        this.fetchShippers();
    }

}
</script>
