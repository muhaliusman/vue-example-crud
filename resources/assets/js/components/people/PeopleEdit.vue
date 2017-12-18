<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-sm btn-default">Back</router-link>
        </div>
 
        <div class="panel panel-default">
            <div class="panel-heading">Edit person</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label" for="name">Name</label>
                            <input type="text" id="name" v-model="person.people_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label" for="address">Address</label>
                            <input type="text" id="address" v-model="person.people_address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label" for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" v-model="person.people_phone_number" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.peopleId = id;
            axios.get('/api/v1/people/' + id + '/edit')
                .then(function (resp) {
                    app.person = resp.data;
                })
                .catch(function () {
                    alert("Could not load your company")
                });
        },
        data: function () {
            return {
                peopleId: null,
                person: {
                    people_name: '',
                    people_address: '',
                    people_mobile_phone: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newPerson = app.person;
                axios.patch('/api/v1/people/' + app.peopleId, newPerson)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not edit person");
                    });
            }
        }
    }
</script>