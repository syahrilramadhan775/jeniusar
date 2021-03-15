<template>
  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    Verikasi Email Berhasil. Silahkan Login Ke Aplikasi Kami. Atau Jika belum
    Punya Silahkan Download Di Playstore Tombol Di Bawah Ini.

    <a href="https://play.google.com/store/apps/details?id=com.Falah.JeniusAR"
      ><img
        alt="Get it on Google Play"
        src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png"
        class="w-72 m-auto mt-3"
    /></a>
  </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
  },
};
</script>
