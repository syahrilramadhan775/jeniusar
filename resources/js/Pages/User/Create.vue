<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User <span class="text-gray-300">- Create</span>
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <jet-form-section @submitted="createUser">
                    <template #title> Users </template>

                    <template #description>
                        Mengenerasi Serial Kode Untuk Buku Jenius Ar
                    </template>

                    <template #form>
                        <!-- Name -->
                        <div
                            class="col-span-6 sm:col-span-4"
                            :class="{ hidden: !form.manual }"
                        >
                            <jet-label for="code" value="Serial Code" />
                            <jet-input
                                id="code"
                                type="text"
                                class="mt-1 block w-full transition-colors"
                                v-model="form.licence"
                                autocomplete="code"
                            />
                            <jet-input-error
                                :message="form.errors.licence"
                                class="mt-2"
                            />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message
                            :on="form.recentlySuccessful"
                            class="mr-3"
                        >
                            Saved.
                        </jet-action-message>

                        <jet-button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            v-on:click="CreateSerialCode"
                        >
                            {{ form.manual ? "Simpan" : "Generate Kode" }}
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
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

    props: ["user"],

    data() {
        return {
            form: this.$inertia.form({
                manual: false,
                licence: "",
            }),
            loading: false,
        };
    },

    methods: {
        CreateSerialCode() {
            // trigger loading modal
            this.loading = true;

            this.form.post(route("license.store"), {
                onSuccess(res) {
                    this.loading = false;
                }, // stop loading modal
            });
        },
    },
};
</script>
