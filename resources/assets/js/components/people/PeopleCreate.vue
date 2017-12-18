<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-sm btn-default">Back</router-link>
        </div>
 
        <div class="panel panel-default">
            <div class="panel-heading">Create new person</div>
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
        data: function () {
            return {
                person: {
                    people_name: '',
                    people_address: '',
                    people_phone_number: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newPerson = app.person;
                axios.post('/api/v1/people', newPerson)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        alert("Could not create person");
                    });
            }
        }
    }
</script>