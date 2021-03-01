<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row">
                    <!-- Active User -->
                    <div
                        class="w-full md:w-1/3 mt-6 px-6 py-7 bg-white shadow-md overflow-hidden md:mr-3 rounded-lg"
                    >
                        <h3 class="text-lg text-gray-500">Active User</h3>
                        <h3 class="text-2xl text-green-500 font-bold">
                            {{ widget.activeUser }}
                        </h3>
                    </div>
                    <!-- Total Serial Number -->
                    <div
                        class="w-full md:w-1/3 mt-6 px-6 py-7 bg-white shadow-md overflow-hidden md:mr-3 rounded-lg"
                    >
                        <h3 class="text-lg text-gray-500">
                            Total Activation Code
                        </h3>
                        <h3 class="text-2xl text-blue-500 font-bold">
                            {{ widget.totalActivation }}
                        </h3>
                    </div>

                    <!-- Active Code Left -->
                    <div
                        class="w-full md:w-1/3 mt-6 px-6 py-7 bg-white shadow-md overflow-hidden md:mr-3 rounded-lg"
                    >
                        <h3 class="text-lg text-gray-500">Active Code Left</h3>
                        <h3 class="text-2xl text-red-500 font-bold">
                            {{ widget.codeLeft }}
                        </h3>
                    </div>
                </div>

                <h3 class="text-xl text-gray-600 mt-5 lg:mt-14">
                    Recent Register User
                </h3>
                <!-- List Component -->
                <table
                    class="min-w-full divide-y divide-gray-200 mt-3 rounded-md shadow-md overflow-hidden"
                >
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
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(u, index) in user" v-bind:key="index">
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
                                class="px-6 py-4 whitespacep -nowrap text-gray-600 text-sm"
                            >
                                {{ convertToFormat(u.license) }}
                            </td>
                        </tr>

                        <!-- More items... -->
                    </tbody>
                </table>
                <!--  -->
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
    props: ["widget", "user"],
    components: {
        AppLayout,
        Welcome,
    },

    methods: {
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
    },
};
</script>
