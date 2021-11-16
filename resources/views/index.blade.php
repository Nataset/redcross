@extends('layouts.main')

@section('content')
<div class="fixed w-screen h-screen opacity-75 bg-gray-400 flex flex-col justify-center items-center z-50">
    <div class=" animate-spin h-12 w-12 rounded-full bg-transparent border-8 border-transparent border-opacity-50 mx-auto opacity-100"
        style="border-right-color: white; border-top-color: white;" viewBox="0 0 24 24"></div>
        <span class="text-white animate-bounce">
            Loading...
        </span>

</div>
    <div id="app" class="shadow-lg border-4 bg-white mt-5 w-full md:w-5/6 lg:w-3/4 mx-auto">

        <div class=" " id="cover">

            <h1 class="bg-gray-800 tracking-widest text-white text-center pt-4 pb-4 pl-3  ">
                <span class="  sm:text-4xl font-semibold text-2xl ">ส่งความสนุกไปกับโปสการ์ด
                    <div class="absolute text-xl " style="bottom: -1.5rem;right: 0; ">

                    </div>
                </span>




            </h1>
            <div class="">
                <div class="py-8">
                    <img src="{{ $imgUrl }}" alt="Bird1" class="object-contain mx-auto max-w-full shadow-lg"
                        style="max-height: 500px">
                </div>
                <div class="sm:pl-8 px-auto text-lg md:text-2xl mb-4 text-center md:text-left">
                    <span>&#9993;</span>
                    <span> ร่วมส่งต่อความสนุกผ่านช่องทางต่อไปนี้ </span>
                </div>
                <div class="text-center text-2xl inline-flex w-full bg-white  border-white ">
                    <button v-on:click="showMailContent()" class="flex-1 w-1/2 text-center relative z-10 font-bold"
                        v-bind:class="{ active: tweet,  ' border-transparent  p-3 w-1/2 bg-blue-500 text-white rounded-tr-2xl': mail }">Email
                        <div v-on:click="showNewTweet()" v-if="mail"
                            class="bg-transparent  rounded-b-2xl  left-full absolute   h-1/2 "
                            style="width: 50px ;bottom: 0; box-shadow: -25px 0 0 0 rgba(59, 130, 246, var(--tw-bg-opacity));">
                        </div>
                    </button>
                    <button v-on:click="showTwitterContent()" class="flex-1 w-1/2 text-center relative font-bold"
                        v-bind:class="{ active: mail,  ' border-transparent  p-3 w-1/2  bg-blue-500 text-white rounded-tl-2xl': tweet }">Twitter
                        <div v-on:click="showNew()" v-if="tweet"
                            class="bg-transparent  rounded-b-2xl  right-full z-0 absolute w-2/12  h-1/2 "
                            style="width: 50px; bottom: 0; box-shadow: 25px 0 0 0 rgba(59, 130, 246, var(--tw-bg-opacity));">

                        </div>
                    </button>
                </div>
                <form action="{{ route('send-email') }}" method="post">
                    @csrf
                    <div class=" px-4 py-6 text-md md:text-xl  space-y-3">
                        <div>
                            <input class="hidden  " type="text" name="img-url" value="{{ $imgUrl }}">
                        </div>
                        <div v-if="mail" class="mb-2 space-y-3" id="" onclick="">
                            <label for="senderName" class="font-bold">ชื่อผู้ส่ง</label>
                            <input class="w-full text-xl pl-3 py-2 bg-gray-100" type="text" name="senderName"
                                placeholder="ผู้ส่ง" autocomplete="off">
                        </div>
                        @error('senderName')
                            <div>
                                <span class="text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                        <hr v-if="mail">
                        <div v-if="mail" class="hidden mb-2 space-y-3" id="sendDiv" onclick="">
                            <label for="receiverEmail" class="font-bold">อีเมลผู้รับ</label>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <span>ถึง</span>
                                            </div>
                                        </td>
                                        <td class="w-full">
                                            <div class="">
                                                <input id="toEmail" class="w-full  py-2 pl-2" type="email" name="toEmail"
                                                    onblur="showDiv()">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-if="mail" class="mb-2 space-y-3 " id="first" onclick="showSendDiv()">
                            <label for="receiverEmail" class="font-bold">อีเมลผู้รับ</label>
                            <h1 class="bg-gray-50 text-gray-400 px-3 py-2 font-medium text-xl ">ผู้รับ</h1>
                            @error('toEmail')
                                <div>
                                    <span class="text-red-600">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <hr v-if="mail">
                        <div v-if="mail" class="space-y-3">
                            <label for="receiverName" class="font-bold">ชื่อผู้รับ</label>
                            <input class="w-full text-xl py-2 pl-3 bg-gray-100" type="text" name="receiveName"
                                placeholder="ชื่อผู้รับ" autocomplete="off">
                            @error('receiveName')
                                <div>
                                    <span class="text-red-600">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <hr v-if="mail">
                        <div class="relative space-y-3">
                            <label for="content" class="font-bold">เนื้อหา</label>
                            <textarea id="card_content" name="body" v-model="message"
                                class=" w-full relative text-xl block pl-3 py-3 bg-gray-100" maxlength="90"
                                autocomplete="off" onkeydown="inputSize()" onkeyup="inputSize()"
                                placeholder="#redcrosskupostcard "></textarea>
                            <div id="content_size" class="absolute right-0">
                                0/90
                            </div>
                            @error('body')
                                <div>
                                    <span class="text-red-600">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="text-center ">
                            <button type="submit" v-if="mail"
                                class="bg-blue-500 mt-8 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded ">ส่งโปสการ์ด</button>
                        </div>

                    </div>
                    <div v-if="tweet" class="text-center mt-8" :class="tweet ? '' :  'hidden'">
                        <button class="my-8">
                            <a v-if="tweet" rel="canonical" :href="tweetUrl" data-show-count="false" data-size="large"
                                data-via="KUredcross" data-text="post card"
                                class="bg-blue-500  hover:bg-blue-700 text-white font-bold py-2 px-8 rounded ">Share
                                via
                                Twitter</a>
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script>
        var twurl = "{{ $twitterUrl }}"
        console.log(twurl);
        var vm = new Vue({
            el: '#app',
            data: {
                message: "",
                tweetImg: twurl,
                tweetUrl: `https://twitter.com/intent/tweet?text=%23redcrosskupostcard`,
                tweet: false,
                mail: true,
            },
            watch: {
                message: function(val) {
                    this.tweetUrl =
                        `https://twitter.com/intent/tweet?text=${val} ${this.tweetImg} %23redcrosskupostcard`
                }
            },
            created() {
                this.tweetUrl =
                    `https://twitter.com/intent/tweet?text= ${this.tweetImg} %23redcrosskupostcard`

            },
            methods: {
                showTwitterContent: function() {
                    this.tweet = !this.tweet;
                    this.mail = !this.mail;
                },
                showMailContent: function() {
                    this.mail = !this.mail;
                    this.tweet = !this.tweet;


                },
                showNewTweet: function() {
                    this.tweet = false;
                    this.mail = true;

                }
            }
        })

        function showSendDiv() {
            document.getElementById('sendDiv').style.display = "block";
            document.getElementById('toEmail').focus();
            document.getElementById('first').style.display = "none";
        }

        function showDiv() {
            let size = document.getElementById('toEmail').value.length;
            if (size == 0) {
                document.getElementById('sendDiv').style.display = "none";
                document.getElementById('first').style.display = "block";
            }
        }

        function inputSize() {
            let inputSize = document.getElementById("card_content").value;
            document.getElementById("content_size").innerHTML = inputSize.length + "/90";
        }
        twttr.widgets.load()
    </script>

@endsection
