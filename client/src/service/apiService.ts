import axios, { AxiosError } from "axios";
import { ref } from "vue";
export const submitForm = async <D extends object,E extends object & {errors? : object}>(
  endpoint: string,
  formData: unknown,
  errors: ReturnType<typeof ref<any>>
) => {
  let error!: AxiosError<any,any>;
  const response = await axios.post<D>(endpoint, formData).catch<AxiosError<E>>(e => {
    error = e;
    return e;
  });
  errors.value = {};
  if (error instanceof AxiosError &&  error?.response?.status === 422) {
    Object.keys(error.response.data.errors).forEach((key) => {
      errors.value[key] = error?.response?.data.errors[key][0];
    });
    return error;
  }
    return response;
}