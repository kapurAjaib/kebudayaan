<script lang="ts" setup>
import { submitForm } from '@/service/apiService';
import { AxiosError } from 'axios';
import { useToast } from 'primevue/usetoast';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const isPasswordVisible = ref(false);
const errors = ref({
    name: "",
    email: "",
    password: "",
});
const formData = ref({
    name: '',
    email: '',
    password: '',
});
const togglePassword = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
}

const submitRegistrationForm = async () => {
    const endpoint = 'http://localhost:8000/api/1.0/signup';
    const response = await submitForm(endpoint, formData.value, errors);
    if (!(response instanceof AxiosError)) {
        router.push('/');
    }
}

</script>
<template>
    <PrimeToast />
    <div class="lg:min-h-screen flex flex-column justify-content-center align-items-center py-3">
        <h1 class="register-title text-center lg:mt-0">
            Register
        </h1>
        <h2 class="login-subtitle">
            Join us here to learn and explore more about Indonesian culture.
        </h2>
        <form class="register-form pb-4" @submit.prevent="submitRegistrationForm">
            <div class="input-group">
                <div class="register-label-input">username</div>
                <input v-model="formData.name" class="register-input" :class="{ 'is-error': errors.name }"
                    placeholder="Enter your name" />
                <div class="input-error-text" v-if="errors.name">
                    {{ errors.name }}
                </div>
            </div>
            <div class="input-group">
                <div class="register-label-input">email</div>
                <input v-model="formData.email" class="register-input" placeholder="Enter your email"
                    :class="{ 'is-error': errors.name }" />
                <div class="input-error-text" v-if="errors.email">
                    {{ errors.email }}
                </div>
            </div>
            <div class="input-group">
                <div class="register-label-input">password</div>
                <div class="input-password-wrapper">
                    <input v-model="formData.password" class="register-input input-password"
                        placeholder="Enter your password" :type="isPasswordVisible ? 'text' : 'password'"
                        :class="{ 'is-error': errors.name }" />
                    <button class="password-toggler" type="button" @click="togglePassword">
                        <i v-if="!isPasswordVisible" class="bi bi-eye ic-password "></i>
                        <i v-if="isPasswordVisible" class="bi bi-eye-slash ic-password"></i>
                    </button>
                </div>
                <div class="input-error-text" v-if="errors.password">
                    {{ errors.password }}
                </div>
            </div>
            <div>
                <button class="register-submit-btn" type="submit">
                    Register
                </button>
            </div>
            <div class="text-center my-2">
                or
            </div>
            <div class="register-google">
                <img src="@/assets/image/icon/ic-color-google.svg" class="ic-register" />
                <div class="pl-2 register-google-text">
                    Join with google
                </div>
            </div>
            <div class="text-register-question">
                Already have an account?
                <RouterLink to="/login" class="color-primary no-underline text-underline-hover">
                    Login now
                </RouterLink>
            </div>
        </form>
    </div>
</template>
<style scoped>
.register-title {
    font-size: 2rem;
    font-weight: 700;
    position: relative;
    padding-bottom: 15px;
    margin: 0;
    width: 100%;
    text-transform: uppercase;
}

.register-title::before {
    content: '';
    left: 50%;
    transform: translateX(-50%);
    max-width: 450px;
    width: 100%;
    position: absolute;
    bottom: 0;
    height: 1px;
    border: solid 1px #827f7f;
}

.login-subtitle {
    font-weight: inherit;
    font-size: 1rem;
    max-width: 420px;
    text-align: center;
}

.register-form {
    margin-top: 10px;
    max-width: 450px;
    width: 100%;
}

.register-label-input {
    font-weight: 600;
    margin-bottom: 3px;
    text-transform: capitalize;
}

.register-input {
    padding: 15px;
    width: 100%;
    border-radius: 8px;
    border: transparent;
    font-family: poppins, sans-serif;
    background-color: #F2F2F2;
}

.register-input.is-error:focus {
    outline: solid 2px red;
}


.input-error-text {
    color: red;
    font-size: 0.9rem;
}

.input-group {
    margin-bottom: 17px;
}

.register-submit-btn {
    border: none;
    margin-top: 14px;
    background-color: #00A3FF;
    padding: 13px;
    font-weight: 700;
    color: white;
    border-radius: 8px;
    width: 100%;
}

.ic-register {
    width: 1.5rem;
    aspect-ratio: 1/1;
}

.register-google {
    display: flex;
    align-items: center;
    color: #00A3FF;
    text-transform: capitalize;
    justify-content: center;
    padding: 10px;
    border-radius: 8px;
    border: solid 2px #00A3FF;
    font-weight: 600;

}

.text-register-question {
    font-size: 0.86rem;
    margin-top: 5px;
    text-align: center;
}

.error-icon {
    margin-right: 1px;
    font-size: 1.1rem;
    vertical-align: middle;
}

.input-password-wrapper {
    position: relative;
}

.password-toggler {
    position: absolute;
    right: 12px;
    top: 50%;
    font-size: 1.3rem;
    transform: translateY(-50%);
    border: 0;
    background-color: transparent;
}

.input-password {
    padding-right: 34px;
}
</style>
