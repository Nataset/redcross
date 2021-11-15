@extends('layouts.main')

@section('content')




    <div id="app" class=" mt-5 border-4 border-light-blue-500 border-opacity-50 w-1/2 mx-auto">
        <div class="z-10 " id="cover" onfocus="">

            <div class="bg-black text-white pl-3">
                postcard
            </div>
            <div class="my-8">
                <img src="{{ $imgUrl }}" alt="Bird1" class="object-contain w-full" style="height: 500px">
            </div>
            <form action="{{ route('send-email') }}" method="post">
                @csrf
                <div class="">
                    <div>
                        <input class="hidden  " type="text" name="img-url" value="{{ $imgUrl }}">
                    </div>
                    <hr>
                    <div class="mb-2" id="" onclick="">
                        <input class="w-full text-xl pl-3 " type="text" name="senderName" placeholder="ผู้ส่ง"
                            autocomplete="off">
                    </div>
                    @error('senderName')
                        <div>
                            <span class="text-red-600">{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="hidden mb-2" id="sendDiv" onclick="">
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

                                            <input id="toEmail" class="w-full pl-2" type="text" name="toEmail"
                                                onblur="showDiv()">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mb-2" id="first" onclick="showSendDiv()">
                        <input class="w-full text-xl  pl-3" type="text" placeholder="ผู้รับ" autocomplete="off">
                        @error('toEmail')
                            <div>
                                <span class="text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <hr>
                    <div>
                        <input class="w-full text-xl   pl-3" type="text" name="receiveName" placeholder="ชื่อผู้รับ"
                            autocomplete="off">
                        @error('receiveName')
                            <div>
                                <span class="text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <hr>
                    <div class="relative">
                        <textarea v-model="message" id="card_content" name="body"
                            class=" w-full relative text-xl block pl-3" maxlength="100" autocomplete="off"
                            onkeydown="inputSize()" onkeyup="inputSize()"></textarea>
                        <div id="content_size" class="absolute right-0">
                            0/100
                        </div>
                        @error('body')
                            <div>
                                <span class="text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sent</button>

                <div id="tweet-button">
                    <a :href="tweetUrl">Share via Tweet</a>
                </div>


            </form>
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
            document.getElementById("content_size").innerHTML = inputSize.length + "/100";
        }

        twttr.widgets.load()
    </script>
@endsection
