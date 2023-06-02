<template>
    <h5>Комментарии :</h5>
    <div class="col-sm-5 col-md-6 col-12 pb-4" style="display: flex;flex-direction: column;align-items: center;width: 100%; overflow-y: scroll; height: 100%" >
        <div class="comment mt-4 text-justify float-left" style="max-width: 680px;">
            <h4>Jhon Doe</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="text-justify darker mt-4 float-right" style="max-width: 680px">
            <h4>Rob Simpson</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="comment mt-4 text-justify float-left" style="max-width: 680px">
            <h4>Jhon Doe</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="text-justify darker mt-4 float-right" style="max-width: 680px">
            <h4>Rob Simpson</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="comment mt-4 text-justify float-left" style="max-width: 680px">
            <h4>Jhon Doe</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="text-justify darker mt-4 float-right" style="max-width: 680px">
            <h4>Rob Simpson</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="comment mt-4 text-justify float-left" style="max-width: 680px">
            <h4>Jhon Doe</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="text-justify darker mt-4 float-right" style="max-width: 680px">
            <h4>Rob Simpson</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="comment mt-4 text-justify float-left" style="max-width: 680px">
            <h4>Jhon Doe</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
        <div class="text-justify darker mt-4 float-right" style="max-width: 680px">
            <h4>Rob Simpson</h4>
            <span>- 20 October, 2018</span>
            <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Comments"
}
</script>

<style scoped>

body{
    background-color: black;
}


.darker{
    border: 1px solid #ecb21f;
    background-color: black;
    float: right;
    border-radius: 5px;
    padding-left: 40px;
    padding-right: 30px;
    padding-top: 10px;
}

.comment{
    border: 1px solid rgba(16, 46, 46, 1);
    background-color: rgba(16, 46, 46, 0.973);
    float: left;
    border-radius: 5px;
    padding-left: 40px;
    padding-right: 30px;
    padding-top: 10px;

}
.comment h4,.comment span,.darker h4,.darker span{
    display: inline;
}

.comment p,.comment span,.darker p,.darker span{
    color: rgb(184, 183, 183);
}

h4{
    color: white;
    font-weight: bold;
}
h5{
    text-align: center;
}
label{
    color: rgb(212, 208, 208);
}

.form-group p a{
    color: white;
}

#darker img{
    margin-right: 15px;
    position: static;
}

.form-group input,.form-group textarea{
    background-color: black;
    border: 1px solid rgba(16, 46, 46, 1);
    border-radius: 12px;
}

form{
    border: 1px solid rgba(16, 46, 46, 1);
    background-color: rgba(16, 46, 46, 0.973);
    border-radius: 5px;
    padding: 20px;
}

</style>
