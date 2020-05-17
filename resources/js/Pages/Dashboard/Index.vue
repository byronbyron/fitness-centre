<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>This is the Dashboard {{ firstName }} {{ lastName }}</p>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Shared/Layout';

export default {
    components: { Layout },

    props: ['firstName', 'lastName']
};
</script>
