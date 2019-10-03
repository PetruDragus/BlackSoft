<template>
    <div class="container">
        <center><h1>Vue laravel Full-Calendar</h1></center>
        <full-calendar :event-sources="eventSources"></full-calendar>
    </div>
</template>
<script>
    export default{
        data() {
            return {
                eventSources: [
                    {
                        events(start, end, timezone, callback) {
                            axios.get('http://127.0.0.1:8000/events').then(response => {
                                callback(response.data.calendardata)
                            })
                        },
                        color: 'yellow',
                        textColor: 'black',
                    }
                ]
            }
        }
    }
