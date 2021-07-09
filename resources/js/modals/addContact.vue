<template>
    <b-modal id="create_contact" title="Create a contact" hide-footer="true">
        <b-form-group
            id="input-group-1"
            label="Contacts name:"
            label-for="input-1"
        >
            <b-form-input
                id="input-1"
                v-model="contact_name"
                type="text"
                required
            ></b-form-input>
        </b-form-group>
        <b-form-group
            id="input-group-1"
            label="Contacts number:"
            label-for="input-1"
        >
            <b-form-input
                id="input-1"
                v-model="contact_number"
                type="text"
                required
            ></b-form-input>
        </b-form-group>
        <b-form-checkbox
            id="checkbox-1"
            v-model="is_primary"
            name="checkbox-1"
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
            if(this.is_primary === "true") {
                this.is_primary = true;
            }
            const data = {
                shipper_id: this.shipper_id,
                contact_name: this.contact_name,
                contact_number: this.contact_number,
                is_primary: this.is_primary
            }
            this.axios.post('api/contacts/store', data).then(response => {
                this.$bvModal.hide('create_contact');
            }).catch(e => {
                console.log(e);
            })
        }
    }
}
</script>

<style scoped>

</style>
