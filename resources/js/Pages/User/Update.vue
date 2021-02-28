<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        User <span class="text-gray-300">- Create</span>
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <jet-form-section @submitted="UpdateUserProfile">
          <template #title> Users </template>

          <template #description> Edit Users Jenius Ar </template>

          <template #form>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="email" value="Email" />
              <jet-input
                id="email"
                type="text"
                class="mt-1 block w-full transition-colors bg-gray-300"
                v-model="form.email"
                readonly="true"
              />
              <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>
            <!-- End-email -->

            <!-- username -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="username" value="Username" />
              <jet-input
                id="username"
                type="text"
                class="mt-1 block w-full transition-colors"
                v-model="form.username"
              />
              <jet-input-error :message="form.errors.username" class="mt-2" />
            </div>
            <!-- End-username -->

            <!-- name -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="name" value="Name" />
              <jet-input
                id="name"
                type="text"
                class="mt-1 block w-full transition-colors"
                v-model="form.name"
              />
              <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>
            <!-- End-name -->

            <!-- license -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="license" value="license" />
              <jet-input
                id="license"
                type="text"
                class="mt-1 block w-full transition-colors bg-gray-300"
                v-model="form.license"
                readonly="true"
              />
              <jet-input-error :message="form.errors.license" class="mt-2" />
            </div>
            <!-- End-license -->
          </template>

          <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
              Saved.
            </jet-action-message>

            <jet-button
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Simpan
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
        _method: "PUT",
        email: this.user.email,
        username: this.user.username,
        name: this.user.name,
        license: this.user.license,
      }),
      loading: false,
    };
  },

  methods: {
    UpdateUserProfile() {
      this.form.post(route("client.update"));
    },
  },
};
</script>
