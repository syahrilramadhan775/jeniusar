<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <jet-form-section @submitted="updateProfileInformation">
                    <template #title>
                         Serial Code
                    </template>

                    <template #description>
                        Mengenerasi Serial Kode Untuk Buku Jenius Ar
                    </template>

                    <template #form>

                        <!-- Toggle Switch -->
                        <div class="col-span-6 sm:col-span-4 flex items-center">
                            <div class="w-9 h-5 flex items-center bg-gray-300 rounded-full p-1 transition-colors" :class="{'bg-blue-300' : form.manually}" @click="form.manually = !form.manually">
                                
                                <div class="bg-white w-4 h-4 rounded-full shadow-md transition-transform transform" :class="{'translate-x-3' : form.manually}"></div>
                            
                            </div>
                            <label for="code" class="ml-3 text-gray-400 text-sm" > Buat Manual Serial Code </label>
                        </div>

                        <!-- Name -->
                        <div class="col-span-6 sm:col-span-4" :class="{'hidden' : !form.manually }">
                            <jet-label for="code" value="Serial Code" />
                            <jet-input id="code" type="text" class="mt-1 block w-full transition-colors"  v-model="form.code" autocomplete="code"  />
                            <jet-input-error :message="form.errors.code" class="mt-2" />
                        </div>

                    </template>

                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            {{ form.manually ? 'Simpan' : 'Generate Kode' }}
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import AppLayout from "@/Layouts/AppLayout";

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            AppLayout,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    manually : false,
                    code : ''
               }),
            }
        },

        methods: {
            updateProfileInformation() {

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true
                });
            },
        },
    }
</script>
