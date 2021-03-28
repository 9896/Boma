<template>
<div class="hello-world">
<p>{{ getGreeting }}</p>
<p> Yeez tunaanza SFC</p>
Kucheka tu blahd

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


</div>
</template>

<script>
export default {
    name: 'Laugh',
    data(){
        return {
            kuriaGreeting: 'Nacheka',
        }
    },

    computed: {
        getGreeting(){
            return this.kuriaGreeting;
        }
    }
}
</script>