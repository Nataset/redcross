@extends('layouts.main')

@section('content')


<div class=" mt-5 border-4 border-light-blue-500 border-opacity-50 w-1/2 mx-auto" >
    <div class="z-10 " id="cover" onfocus="">

        <div class="bg-black text-white pl-3">
            postcard
        </div>
        <div class="my-8">
            <img src="{{ $imgUrl }}" alt="Bird1" class="object-contain w-full" style="height: 500px">
        </div>
        <form action="{{ route('send-email') }}" method="post">
            @csrf
            <div class="" >
                <div>
                    <input class="hidden  " type="text" name="img-url" value="{{ $imgUrl }}">
                </div>
                <hr>
                <div class="mb-2" id="" onclick="">
                    <input  class="w-full text-xl pl-3 " type="text" name="recieve" placeholder="ผู้ส่ง" autocomplete="off">
                </div>
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
                                        <input id="toEmail" class="w-full pl-2" type="text" onblur="showDiv()">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-2" id="first" onclick="showSendDiv()">
                    <input  class="w-full text-xl  pl-3" type="text" placeholder="ผู้รับ" autocomplete="off">
                </div>
                <hr>
                <div id="" onclick="">
                    <input  class="w-full text-xl   pl-3" type="text" name="subject" placeholder="เรื่อง" autocomplete="off">
                </div>
                <hr>
                <div class="relative">
                    <textarea id="card_content"
                    class=" w-full relative left-1/3 w-1/3 md:left-0 text-xl block pl-3"
                    maxlength = "100"
                    autocomplete="off"
                    onkeydown="inputSize()"
                    onkeyup="inputSize()"></textarea>
                    <div id="content_size"
                    class="absolute right-0">
                        0/100
                    </div>
                </div>

            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sent</button>
            <div id="tweet-button">
                <a rel="canonical" href="https://twitter.com/intent/tweet" class="twitter-share-button" data-show-count="false"data-size="large"
                data-via="KUredcross"
                data-text="post card">Tweet</a>

            </div>

        </form>
        </div>
    </div>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script>

function showSendDiv() {
  document.getElementById('sendDiv').style.display = "block";
  document.getElementById('toEmail').focus();
  document.getElementById('first').style.display = "none";
}

function showDiv() {

  let size = document.getElementById('toEmail').value.length;
  if(size == 0){

    document.getElementById('sendDiv').style.display = "none";
    document.getElementById('first').style.display = "block";
  }

}
function inputSize(){
    let inputSize = document.getElementById("card_content").value;
    document.getElementById("content_size").innerHTML = inputSize.length + "/100";

}


    document.getElementById("tweet-button").innerHTML = '<a rel="canonical" href="https://twitter.com/intent/tweet" class="twitter-share-button" data-size="large" data-via="KUredcross " data-show-count="false" data-url="http://6749-1-46-138-111.ngrok.io/bird/2" data-text="test text" >Tweet</a>'
    twttr.widgets.load()
</script>
@endsection


