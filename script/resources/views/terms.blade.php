@extends('layouts.frontend.app')

@section('title', 'Terms and Conditions')

@section('content')

<!-- success-alert start -->
<div class="alert-message-area">
    <div class="alert-content">
        <h4 class="ale">{{ __('Your Settings Successfully Updated') }}</h4>
    </div>
</div>
<!-- success-alert end -->

<!-- error-alert start -->
<div class="error-message-area">
    <div class="error-content">
        <h4 class="error-msg">{{ __('Your Settings Successfully Updated') }}</h4>
    </div>
</div>
<!-- error-alert end -->

<!-- ellipsis modal -->
<div class="ellipish-modal d-none">
  <div class="ellipish-modal-content">
    
  </div>
</div>


<!-- modal -->
<div class="bg-modal d-none">
    <div class="close-btn">
        <a href="javascript:void(0)"><img src="{{ asset('frontend/img/cancel.png') }}"></a>
    </div>
    <div class="modal-content-area">
      
    </div>
</div>

<section>
    <div class="main-area pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="center">

                        <p><strong><a href="#">{{env('APP_NAME')}}</a></strong> is a christian social site service that allows members to create unique personal profiles online in order to find and communicate with peers and church community onlinr. 
                            By using either the Website or App you agree to be bound by these Terms of Use (this &quot;Agreement&quot;), whether or not you register as a member (&quot;Member&quot;). 
                            If you wish to become a Member, enjoy the online church experience with other peers and make use of these services (the &quot;Service&quot;), 
                            please read this Agreement and indicate your acceptance by following the instructions in the Registration process.</p>
                        <p>&nbsp;</p>
                        <p>This Agreement sets out the legally binding terms for your use of the Website and your Membership in the Service.<br />
                            {{env('APP_NAME')}} may modify this Agreement from time to time and such modification shall be effective upon posting on the Website. 
                            You agree to be bound to any changes to this Agreement when you use the Service after any such modification is posted. 
                            This Agreement includes {{env('APP_NAME')}}'s policy for acceptable use and content posted on the Website, your rights, obligations and restrictions regarding your use of the Website and the Service and {{env('APP_NAME')}}'s Privacy Policy.</p>
                        <p>&nbsp;</p>
                        <p>Please choose carefully the information you post on {{env('APP_NAME')}}  and that you provide to other Members. Any photographs posted by you may not contain nudity, violence, or offensive subject matter. 
                            Information provided by other {{env('APP_NAME')}} Members (for instance, in their Profile) may contain inaccurate, inappropriate or offensive material, products or services and {{env('APP_NAME')}}  assumes no responsibility nor liability for this material.</p>
                        <p>&nbsp;</p>
                        <p>{{env('APP_NAME')}} reserves the right, in its sole discretion, to reject, refuse to post or remove any posting (including email) by you, or to restrict, suspend, or terminate your access to all or any part of the Website and/or Services at any time, for any or no reason, with or without prior notice, and without lability.</p>
                        <p>&nbsp;</p>
                        <p>By participating in any offline {{env('APP_NAME')}}  event, you agree to release and hold {{env('APP_NAME')}} harmless from any and all losses, damages, rights, claims, and actions of any kind including, without limitation, personal injuries, death, and property damage, either directly or indirectly related to or arising from your participation in any such offline {{env('APP_NAME')}}  event.</p>
                        <p>&nbsp;</p>
                        
                        <h4>Terms of Use</h4>
                        
                        <p>&nbsp;</p>
                        <p><b>1) Your Interactions.</b></p>
                        <p>You are solely responsible for your interactions and communication with other Members. You understand that {{env('APP_NAME')}}  does not in any way screen its Members, nor does it inquire into the backgrounds of its Members or attempt to verify the statements of its Members. 
                            {{env('APP_NAME')}}  makes no representations or warranties as to the conduct of Members or their compatibility with any current or future Members. We do however recommend that if you  choose to meet or exchange personal information with any member of {{env('APP_NAME')}}  then you should take it upon yourself to do a background check on said person.</p>
                        <p>In no event shall {{env('APP_NAME')}}  be liable for any damages whatsoever, whether direct, indirect, general, special, compensatory, consequential, and/or incidental, arising out of or relating to the conduct of you or anyone else in connection with the use of the Service, including without limitation, bodily injury, emotional distress, and/or any other damages resulting from communications or meetings with other registered users of this Service or persons you meet through this Service.</p>
                        <p>&nbsp;</p>
                        
                        <p><b>2) Eligibility.</b></p>
                        <p>Membership in the Service where void is prohibited. By using the Website and the Service, you represent and warrant that all registration information you submit is truthful and accurate and that you agree to maintain the accuracy of such information. You further represent and warrant that you are 18 years of age or older and that your use of the {{env('APP_NAME')}}  shall not violate any applicable law or regulation. Your profile may be deleted without warning, if it is found that you are misrepresenting your age. Your Membership is solely for your personal use, and you shall not authorize others to use your account, including your profile or email address. You are solely responsible for all content published or displayed through your account, including any email messages, and for your interactions with other members. </p>
                        <p>&nbsp;</p>
                        
                        <p><b>3) Term/Fees.</b></p>
                        <p>This Agreement shall remain in full force and effect while you use the Website, the Service, and/or are a Member. You may terminate your membership at any time. {{env('APP_NAME')}} may terminate your membership for any reason, effective upon sending notice to you at the email address you provide in your Membership application or other email address as you may subsequently provide to {{env('APP_NAME')}}. By using the Service and by becoming a Member, you acknowledge that {{env('APP_NAME')}} reserves the right to charge for the Service and has the right to terminate a Member's Membership if Member should breach this Agreement or fail to pay for the Service, as required by this Agreement.</p>
                        <p>&nbsp;</p>
                        
                        <p><b>4) Non Commercial Use by Members.</b></p>
                        <p>The Website is for the personal use of Members only and may not be used in connection with any commercial endeavors except those that are specifically endorsed or approved by the management of {{env('APP_NAME')}}. Illegal and/or unauthorized use of the Website, including collecting usernames and/or email addresses of Members by electronic or other means for the purpose of sending unsolicited email or unauthorized framing of or linking to the Website will be investigated. Commercial advertisements, affiliate links, and other forms of solicitation may be removed from member profiles without notice and may result in termination of membership privileges. Appropriate legal action will be taken by {{env('APP_NAME')}} for any illegal or unauthorized use of the Website.</p>
                        <p>&nbsp;</p>
                        
                        <p><b>5) Proprietary Rights in Content on {{env('APP_NAME')}}.</b></p>
                        <p>{{env('APP_NAME')}} owns and retains all proprietary rights in the Website and the Service. The Website contains copyrighted material, trademarks, and other proprietary information of {{env('APP_NAME')}}
                        and its licensors. Except for that information which is in the public domain or for which you have been given written permission, you may not copy, modify, publish, transmit, distribute, perform, display, or sell any such proprietary information.</p>
                        <p>&nbsp;</p>
                        
                        <p><b>6) Content Posted on the Site.</b></p>
                        <p>a. You understand and agree that {{env('APP_NAME')}} may review and delete any content, messages, {{env('APP_NAME')}} Messenger messages, photos or profiles (collectively, &quot;Content&quot;) that in the sole judgment of {{env('APP_NAME')}} violate this Agreement or which may be offensive, illegal or violate the rights, harm, or threaten the safety of any Member. </p>
                        <p>&nbsp;</p>
                        
                        <p>b. You are solely responsible for the Content that you publish or display (hereinafter, &quot;post&quot;) on the Service or any material or information that you transmit to other Members.</p>
                        <p>&nbsp;</p>
                        <p>c. By posting any Content to the public areas of the Website, you hereby grant to {{env('APP_NAME')}} the non-exclusive, fully paid, worldwide license to use, publicly perform and display such Content on the Website. This license will terminate at the time you remove such Content from the Website.</p>
                        <p>&nbsp;</p>
                        <p>d. The following is a partial list of the kind of Content that is illegal or prohibited on the Website. {{env('APP_NAME')}} reserves the right to investigate and take appropriate legal action in its sole discretion against anyone who violates this provision, including without limitation, removing the offending communication from the Service and terminating the membership of such violators. Prohibited Content includes Content that:</p>
                        <p>&nbsp;</p>
                        <p>  i. is patently offensive and promotes racism, bigotry, hatred or physical harm of any kind against any group or individual; </p>
                        <p><br />
                          ii. harasses or advocates harassment of another person;</p>
                        <p><br />
                          iii. involves the transmission of &quot;junk mail&quot;, &quot;chain letters,&quot; or unsolicited mass mailing or &quot;spamming&quot;;</p>
                        <p><br />
                          iv. promotes information that you know is false or misleading or promotes illegal activities or conduct that is abusive, threatening,
                          obscene, defamatory or libelous;</p>
                        <p><br />
                          v. promotes an illegal or unauthorized copy of another person's copyrighted work, such as providing pirated computer programs or links
                          to them, providing information to circumvent manufacture-installed copy-protect devices, or providing pirated music or links to
                          pirated music files;</p>
                        <p><br />
                          vi. contains restricted or password only access pages or hidden pages or images (those not linked to or from another accessible page);</p>
                        <p><br />
                          vii. provides material that exploits people under the age of 18 in a sexual or violent manner, or solicits personal information from
                          anyone under 18;</p>
                        <p><br />
                          viii. provides instructional information about illegal activities such as making or buying illegal weapons, violating someone's privacy,
                          or providing or creating computer viruses; </p>
                        <p><br />
                          ix. solicits passwords or personal identifying information for commercial or unlawful purposes from other users;</p>
                        <p><br />
                          or x. involves commercial activities and/or sales without our prior written consent such as contests, sweepstakes, barter, advertising,
                          or pyramid schemes.</p>
                        <p>&nbsp;</p>
                        <p>e. You must use the Service in a manner consistent with any and all applicable laws and regulations. f. You may not engage in advertising to, or solicitation of, any Member to buy or sell any products or services through the Service. You may not transmit any chain letters or junk email to other Members. Although {{env('APP_NAME')}} cannot monitor the conduct of its Members off the Website, it is also a violation of these rules to use any information obtained from the Service in order to harass, abuse, or harm another person, or in order to contact, advertise to, solicit, or sell to any Member without their prior explicit consent. In order to protect our Members from such advertising or solicitation, {{env('APP_NAME')}} reserves the right to restrict the number of emails which a Member may send to other Members in any 24-hour period to a number which {{env('APP_NAME')}} deems appropriate in its sole discretion.</p>
                        <p>&nbsp;</p>
                        <p>g. You may not cover or obscure the banner advertisements on your personal profile page, or any {{env('APP_NAME')}} page via HTML/CSS or any other means.</p>
                        <p>&nbsp;</p>
                        <p>  h. Any automated use of the system, such as using scripts to add friends, is prohibited.</p>
                        <p>&nbsp;</p>
                        <p> i. You may not attempt to impersonate another user or person who is not a member of {{env('APP_NAME')}}.</p>
                        <p>&nbsp;</p>
                        <p> j. You may not use the account, username, or password of another Member at any time nor may you disclose your password to any third party
                          or permit any third party to access your account.</p>
                        <p>&nbsp;</p>
                        <p> k. You may not sell or otherwise transfer your profile.</p>
                        <p>&nbsp;</p>
                        <p><b>7) Copyright Policy.</b></p>
                        <p>You may not post, distribute, or reproduce in any way any copyrighted material, trademarks, or other proprietary information without obtaining the prior written consent of the owner of such proprietary rights. It is the policy of {{env('APP_NAME')}} to terminate membership privileges of any member who repeatedly infringes copyright upon prompt notification to {{env('APP_NAME')}} by the copyright owner or the copyright owner's legal agent. Without limiting the foregoing, if you believe that your work has been copied and posted on the Service in a way that constitutes copyright infringement, please provide our Copyright Agent with the following information: an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest; a description of the copyrighted work that you claim has been infringed; a description of where the material that you claim is infringing is located on the Website; your address, telephone number, and email address; a written statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; a statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or authorized to act on the copyright owner's behalf. {{env('APP_NAME')}}'s Copyright Agent for notice of claims of copyright infringement can be reached via email address.</p>
                        <p>&nbsp;</p>
                        <p><b>8) Member Disputes.</b></p>
                        <p>You are solely responsible for your interactions with other {{env('APP_NAME')}} Members. {{env('APP_NAME')}} reserves the right, but has no obligation,  to monitor disputes between you and other Members.</p>
                        <p>&nbsp;</p>
                        <p><b>9) Disclaimers.</b></p>
                        <p>You agree that online services can be dangerous!</p>
                        <p>{{env('APP_NAME')}} is not responsible for any incorrect or inaccurate content posted on the Website or in connection with the Service provided, whether caused by users of the Website, Members or by any of the equipment or programming associated with or utilized in the Service. {{env('APP_NAME')}} is not responsible for the conduct, whether online or offline, of any user of the Website or Member of the Service. {{env('APP_NAME')}} assumes no responsibility for any error, omission, interruption, deletion, defect, delay in operation or transmission, communications line failure, theft or destruction or unauthorized access to, or alteration of, any user or Member communication. {{env('APP_NAME')}} is not responsible for any problems or technical malfunction of any telephone network or lines, computer online systems, servers or providers, computer equipment, software, failure of any email or players due to technical problems or traffic congestion on the Internet or at any Website or combination thereof, including any injury or damage to users and/or Members or to any person's computer related to or resulting from participation or downloading materials in connection with the Website and/or in connection with the Service. Under no circumstances shall {{env('APP_NAME')}} be responsible for any loss or damage, including personal injury or death, resulting from use of the Website or the Service or from any Content posted on the Website or transmitted to Members, or any interactions between users of the Website, whether online or offline. The Website and the Service are provided &quot;AS-IS&quot; and {{env('APP_NAME')}} expressly disclaims any warranty of fitness for a particular purpose or non-infringement. {{env('APP_NAME')}} cannot guarantee and does not promise any specific results from use of the Website and/or the Service.</p>
                        <p>&nbsp;</p>
                        <p><b>10</b><b>) Limitation on Liability.</b></p>
                        <p>IN NO EVENT SHALL {{env('APP_NAME')}} BE LIABLE TO YOU OR ANY THIRD PARTY FOR ANY INDIRECT, CONSEQUENTIAL, EXEMPLARY, INCIDENTAL, SPECIAL OR PUNITIVE DAMAGES, INCLUDING LOST PROFIT DAMAGES ARISING FROM YOUR USE OF THE WEB SITE OR THE SERVICE, EVEN IF {{env('APP_NAME')}} HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. NOTWITHSTANDING ANYTHING TO THE CONTRARY CONTAINED HEREIN, {{env('APP_NAME')}}.S LIABILITY TO YOU FOR ANY CAUSE WHATSOEVER AND REGARDLESS OF THE FORM OF THE ACTION, WILL AT ALL TIMES BE LIMITED TO AMOUNT PAID, IF ANY, BY YOU TO {{env('APP_NAME')}} FOR THE SERVICE DURING THE TERM OF MEMBERSHIP.</p>
                        <p>&nbsp;</p>
                        <p><b>11) Disputes.</b></p>
                        <p>If there is any dispute about or involving the Website and/or the Service, by using the Website, you agree that any dispute shall be governed by the laws of the area in which we are based without regard to conflict of law provisions and you agree to personal jurisdiction by and venue in the area in which we are based.</p>
                        <p>&nbsp;</p>
                        <p><b>12) Indemnity.</b></p>
                        <p>You agree to indemnify and hold {{env('APP_NAME')}}, its subsidiaries, affiliates, officers, agents, and other partners and employees, harmless from any loss, liability, claim, or demand, including reasonable attorneys' fees, made by any third party due to or arising out of your use of the Service in violation of this Agreement and/or arising from a breach of this Agreement and/or any breach of your representations and warranties set forth above. </p>
                        <p>&nbsp;</p>
                        <p><b>13) Other.</b></p>
                        <p>This Agreement is accepted upon your use of the Website and is further affirmed by you becoming a Member of the Service. This Agreement constitutes the entire agreement between you and {{env('APP_NAME')}} regarding the use of the Website and/or the Service. The failure of {{env('APP_NAME')}} to exercise or enforce any right or provision of this Agreement shall not operate as a waiver of such right or provision. The section titles in this Agreement are for convenience only and have no legal or contractual effect.
                          Please <a href="{{ route('contact') }}">contact us</a> with any questions regarding this Agreement.
                        </p>
                        <p>&nbsp;</p>
                        <p class="bold red">I HAVE READ THIS AGREEMENT AND AGREE TO ALL OF THE PROVISIONS CONTAINED ABOVE.</p>
                    </div>
                </div>
                @include('layouts.frontend.partials.sidebar')
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="popup_url" value="{{ route('popup') }}">
<input type="hidden" id="ellipsis_url" value="{{ route('ellipsis') }}">
<input type="hidden" id="asset_url" value="{{ route('welcome') }}">

<!-- copied to clipboard -->
<div class="copied">
  <p>{{ __('Link copied to clipboard.') }}</p>
</div>
@endsection
