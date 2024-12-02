<template>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Datos del Monitoreo de Orquídeas</h1>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Humedad (%)</th>
          <th>Temperatura (°C)</th>
          <th>Fecha y Hora</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in registros" :key="item.id">
          <td>{{ index + 1 }}</td>
          <td>{{ item.humedad }}</td>
          <td>{{ item.temperatura }}</td>
          <td>{{ item.created_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "MonitorComponent",
  data() {
    return {
      registros: [], 
    };
  },
  methods: {
    async obtenerRegistros() {
      try {
        const response = await axios.get("http://127.0.0.1:8000/monitoreo");
        this.registros = response.data;
      } catch (error) {
        console.error("Error al obtener los registros:", error);
      }
    },
  },
  mounted() {
    this.obtenerRegistros(); // Llama a la API al cargar el componente
    setInterval(this.obtenerRegistros, 6000); // Actualiza cada 6 segundos
  },
};
</script>

<style>
.container {
  max-width: 900px;
  margin: auto;
}
</style>
