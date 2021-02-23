                        @foreach($users as $user)
                            <!-- Message. Default to the left -->
                                <div class="direct-chat-msg direct-chat-success">
                                    @if (!$loop->first)
                                        <hr>
                                    @endif
                                    @include('admin.documents.includes.user_profile')

                                @if ($user->comments->count() < 1)
                                    @include('admin.documents.includes.chat_waiting')
                                @else
                                    @if ($user->id == auth()->id() || $user->pivot->ordering < auth()->user()->getOrdering($document->id) || auth()->user()->can('comment_grand_access'))
                                        @foreach($user->comments as $comment)
                                                <!-- Comment user in document -->
                                                    <div class="direct-chat-text">
                                                        {!! $comment->comment!!}
                                                    </div>
                                                    <!-- /Comment user in document -->
{{--                                                @if (($comment->status == 0 && $user->id ==auth()->id()) ||  auth()->user()->can('comment_grand_access') )--}}
                                                @if (($comment->submit == 0 && $user->id ==auth()->id()) || auth()->user()->can('comment_grand_edit'))
                                                    <!-- action button comment -->
                                                        @include('admin.documents.includes.action_button_comment')
                                                @endif

                                            @include('admin.documents.includes.modal')
                                        @endforeach
                                    @else
                                        @include('admin.documents.includes.chat_check')
                                    @endif


                                @endif
                                </div>
                                <!-- /.direct-chat-msg -->
                            @endforeach

                            @if (($users->whereIn('id',auth()->id())->count() > 0 && $document->documentComments()->where('user_id', auth()->id())->count() < 1) || auth()->user()->can('comment_grand_access') )
                                @include('admin.documents.includes.chat_input')
                            @endif
