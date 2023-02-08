<template>
  <div class="container">
        <form @submit.prevent="submitData" action="/api/leads" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
            <div class="mb-3">
                <label for="slug" class="form-label">name</label>
                <input :class="{'is-invalid' : errors && errors.name}" type="text" class="form-control" id="name" name="name" v-model="name">
                <div class="invalid-feedback" v-if="errors && errors.name">
                    <ul>
                        <li v-for="error in errors.name" :key="error">{{ error }}</li>
                    </ul>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input :class="{'is-invalid' : errors && errors.email}" type="text" class="form-control" id="email" name="email" v-model="email">
                <div class="invalid-feedback" v-if="errors && errors.email">
                    <ul>
                        <li v-for="error in errors.email" :key="error">{{ error }}</li>
                    </ul>
                </div>
            </div>

            <div class="form-check mb-3">
                <input :class="{'is-invalid' : errors && errors.newsletter}" v-model="newsletter" type="checkbox" class="form-check-input" id="newsletter" name="newsletter">
                <label class="form-check-label" for="validationFormCheck1">Iscrivimi alla newsletter</label>
                <div class="invalid-feedback" v-if="errors && errors.newsletter">
                    <ul>
                        <li v-for="error in errors.newsletter" :key="error">{{ error }}</li>
                    </ul>
                </div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Messaggio</label>
                <textarea :class="{'is-invalid' : errors && errors.message}" class="form-control" id="message" name="message" v-model="message"></textarea>
                <div class="invalid-feedback" v-if="errors && errors.message">
                    <ul>
                        <li v-for="error in errors.message" :key="error">{{ error }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Invia</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            hasErrors: false,
            errors: [],
            name: '',
            email: '',
            newsletter: true,
            message: '',
        };
    },
    methods: {
        resetForm() {
            this.name = '';
            this.email = '';
            this.newsletter = '';
            this.message = '';
        },
        submitData() {
            this.hasErrors = false;
            axios.post('/api/leads', {
                name: this.name,
                email: this.email,
                newsletter: this.newsletter,
                message: this.message,
            })
                .then(response => {
                    if (response.data.success) {
                        this.resetForm();
                        console.log(response.data);
                    } else {
                        this.hasErrors = true;
                        this.errors = response.data.errors;
                    }
                    });
        },
    },
}
</script>

<style>

</style>
