<template>
  <div class="container mt-5">
    <h1 class="text-center">Bienvenido al Monitoreo de Orquídeas</h1>
    <p class="text-center mt-4">
      Utiliza el menú de navegación para visualizar los datos del monitoreo.
    </p>
    <div class="text-center mt-5">
      <router-link to="/visualizar" class="btn btn-primary">Ir al Monitor</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomeComponent",
};
</script>

<style>
.container {
  max-width: 800px;
  margin: auto;
}
</style>
