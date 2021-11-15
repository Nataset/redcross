@extends('layouts.main')

@section('content')
    <div id="app" class=" mt-5 w-full md:w-5/6 lg:w-3/4 mx-auto">
        <div class="z-10 " id="cover" onfocus="">
            <h1 class="bg-black text-white text-5xl py-4 pl-3 w-full">
                โปสการ์ด
            </h1>
            <div class="mb-28 ">
                <div class="bg-gray-100 border-r-4 border-l-4 border-gray-300 pt-8">
                    <img src="{{ $imgUrl }}" alt="Bird1" class="object-contain mx-auto max-w-full shadow-lg"
                        style="max-height: 500px">
                </div>
                <form action="{{ route('send-email') }}" method="post">
                    @csrf
                    <div
                        class="border-r-4 border-b-4 border-l-4 bg-gray-100 border-gray-300 px-4 py-6 text-md md:text-xl space-y-3">
                        <div>
                            <input class="hidden  " type="text" name="img-url" value="{{ $imgUrl }}">
                        </div>
                        <hr>
                        <div class="mb-2 space-y-3" id="" onclick="">
                            <label for="senderName">ชื่อผู้ส่ง</label>
                            <input class="w-full text-xl pl-3 py-2" type="text" name="senderName" placeholder="ผู้ส่ง"
                                autocomplete="off">
                        </div>
                        @error('senderName')
                            <div>
                                <span class="text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="hidden mb-2 space-y-3" id="sendDiv" onclick="">
                            <label for="receiverEmail">อีเมลผู้รับ</label>
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
                        <div class="mb-2 space-y-3 " id="first" onclick="showSendDiv()">
                            <label for="receiverEmail">อีเมลผู้รับ</label>
                            <h1 class="bg-gray-50 text-gray-400 px-3 py-2 font-medium text-xl ">ผู้รับ</h1>
                            @error('toEmail')
                                <div>
                                    <span class="text-red-600">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="space-y-3">
                            <label for="receiverName">ชื่อผู้รับ</label>
                            <input class="w-full text-xl py-2 pl-3" type="text" name="receiveName" placeholder="ชื่อผู้รับ"
                                autocomplete="off">
                            @error('receiveName')
                                <div>
                                    <span class="text-red-600">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="relative space-y-3">
                            <label for="content">เนื้อหา</label>
                            <textarea id="card_content" name="body" v-model="message" class=" w-full relative text-xl block pl-3"
                                maxlength="90" autocomplete="off" onkeydown="inputSize()" onkeyup="inputSize()"></textarea>
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
                            <button type="submit"
                                class="bg-blue-500 mt-8 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded ">ส่งโปสการ์ด</button>
                        </div>
                        <div class="text-right" id="tweet-button">
                            <a :href="tweetUrl">Share via Tweet</a>
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
                tweetUrl: "https://twitter.com/intent/tweet?text=%23redcrosskupostcard",
                tweetImg: twurl
            },
            watch: {
                message: function(val) {
                    this.tweetUrl =
                        `https://twitter.com/intent/tweet?text=${val} ${this.tweetImg} %23redcrosskupostcard`
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
