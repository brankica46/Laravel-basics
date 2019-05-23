<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Komponenta 1</div>

                    <div class="card-body">
                        <p>Moje ime je: {{ime}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data: function() {
        return {
          ime: "Pedja",
          prezime: "Bozic"
        }
      }
    }

</script>
