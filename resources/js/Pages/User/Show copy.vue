<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User <span class="text-gray-300">- Show</span>
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div
                    class="flex items-center md:justify-between justfiy-start flex-col md:flex-row"
                >
                    <link-button
                        :href="route('client.create')"
                        class="mt-3 shadow-md mr-auto"
                    >
                        add Users
                    </link-button>

                    <!-- Input Search -->
                    <div
                        class="mt-1 relative rounded-md shadow-sm w-full md:w-max mt-5 md:mt-0"
                    >
                        <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                ></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            :disabled="loading"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-12 pr-28 py-2 sm:text-sm md:text-base bg-white border-transparent rounded-md"
                            :class="{ 'bg-gray-200': loading }"
                            :placeholder="column"
                            @input="search"
                        />
                        <div
                            class="absolute inset-y-0 right-0 flex items-center pl-2"
                        >
                            <label for="currency" class="sr-only"
                                >Currency</label
                            >
                            <select
                                id="currency"
                                name="currency"
                                class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md"
                                v-model="column"
                                @change="search()"
                            >
                                <option value="username">Username</option>
                                <option value="email">Email</option>
                                <option value="name">Name</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Input Search -->
                </div>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <!-- List Component -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 semi uppercase tracking-wider"
                                    >
                                        Name
                                    </th>

                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 semi uppercase tracking-wider"
                                    >
                                        Email
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 semi uppercase tracking-wider"
                                    >
                                        Username
                                    </th>

                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 semi uppercase tracking-wider"
                                    >
                                        Active At
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 semi uppercase tracking-wider"
                                    >
                                        Verification Code
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="(u, index) in showData"
                                    v-bind:key="index"
                                >
                                    <!-- Username -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-gray-600 text-sm font-semibold"
                                    >
                                        {{ u.name }}
                                    </td>
                                    <!-- End Username Table -->

                                    <!-- Username -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-gray-600 text-sm"
                                    >
                                        {{ u.email }}
                                    </td>
                                    <!-- End Username Table -->

                                    <!-- Name -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-gray-600 text-sm"
                                    >
                                        {{ u.username }}
                                    </td>
                                    <!-- End Name Table -->

                                    <!-- Today -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-gray-600 text-sm"
                                    >
                                        {{ u.created_at }}
                                    </td>
                                    <!--  -->

                                    <!-- verification code -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-gray-600 text-sm"
                                    >
                                        {{ convertToFormat(u.license) }}
                                    </td>
                                    <!--  -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                    >
                                        <a
                                            href="javascript:void(0)"
                                            @click="changeProfileByEmail(u.id)"
                                            class="ml-5"
                                            :class="{
                                                'text-red-400 hover:text-red-400': loading,
                                                'text-red-600 hover:text-red-900': !loading,
                                            }"
                                            >Change Profile By Email</a
                                        >
                                        <a
                                            href="javascript:void(0)"
                                            @click="deleteClient(u.id)"
                                            class="ml-5"
                                            :class="{
                                                'text-red-400 hover:text-red-400': loading,
                                                'text-red-600 hover:text-red-900': !loading,
                                            }"
                                            >Delete</a
                                        >
                                    </td>
                                </tr>

                                <!-- More items... -->
                            </tbody>
                        </table>
                        <!--  -->
                    </div>
                </div>
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
import JetDangerButton from "@/Jetstream/DangerButton";
import AppLayout from "@/Layouts/AppLayout";
import LinkButton from "@/Components/LinkButton";
import ElButton from "@/Components/Button";

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetDangerButton,
        JetSecondaryButton,
        AppLayout,
        LinkButton,
        ElButton,
    },

    props: {
        user: Array,
    },

    data() {
        return {
            form: this.$inertia.form({
                manually: false,
                code: "",
            }),
            showData: this.user,
            loading: false,
            column: "name",
            searchValue: "",
        };
    },

    methods: {
        deleteClient(id) {
            if (this.loading) return;

            this.loading = true;

            let _this = this;
            this.$inertia.delete(route("client.destroy", id), {
                onSuccess() {
                    _this.hasHidden = [];
                    _this.loading = false;
                },
            });
        },

        convertToFormat(code = "") {
            let rebuildString = "";

            for (
                let sliceIndex = 0;
                sliceIndex <= code.length;
                sliceIndex += 4
            ) {
                rebuildString += code.substr(sliceIndex, 4) + " ";
            }
            return rebuildString.toUpperCase();
        },

        changeProfileByEmail(id) {
            var _this = this;
            this.loading = true;
            axios.post(route("profile.change-mail", { id })).then(() => {
                _this.loading = false;
            });
        },

        search(event = false) {
            this.showData = [];
            console.log(event);

            this.searchValue = event ? event.target.value : this.searchValue;
            let search = this.searchValue;

            console.log(search);

            if (search === "") return console.log((this.showData = this.user));

            this.user.forEach((value) => {
                if (value[this.column].indexOf(search) >= 0)
                    this.showData.push(value);
            });
            console.log(this.showData);
        },
    },
};
</script>
