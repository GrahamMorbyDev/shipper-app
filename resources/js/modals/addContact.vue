<template>
    <b-modal id="create_contact" title="Create a contact" :hide-footer="true">
        <b-form-group
            id="input-group-1"
            label="Contacts name:"
            label-for="contact_name"
        >
            <b-form-input
                id="contact_name"
                v-model="contact_name"
                type="text"
                required
            ></b-form-input>
        </b-form-group>
        <b-form-group
            id="input-group-1"
            label="Contacts number:"
            label-for="contact_number"
        >
            <b-form-input
                id="contact_number"
                v-model="contact_number"
                type="text"
                required
            ></b-form-input>
        </b-form-group>
        <b-form-checkbox
            id="is_primary"
            v-model="is_primary"
            name="is_primary"
            value="true"
            unchecked-value="false"
        >
            Is the contact a primary contact
        </b-form-checkbox>
        <b-button variant="success" class="btn-block mt-3" @click="createContact">Create</b-button>
    </b-modal>
</template>

<script>
export default {
    name: "addContact",
    props: ['shipper_id'],
    data() {
        return {
            contact_name: null,
            contact_number: null,
            is_primary: false
        }
    },
    methods: {
        createContact() {
            this.is_primary = this.is_primary === "true";
            const data = {
                shipper_id: this.shipper_id,
                contact_name: this.contact_name,
                contact_number: this.contact_number,
                is_primary: this.is_primary
            }
            this.axios.post('api/contacts/store', data).then(response => {
                this.clearForm();
                this.$bvModal.hide('create_contact');
            }).catch(e => {
                console.log(e);
            })
        },
        clearForm() {
            this.contact_name = null;
            this.contact_number = null;
            this.is_primary = null;
        },
    }
}
</script>

<style scoped>

</style>
