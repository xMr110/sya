@extends('layouts.app')


@section('content')

    <!-- subheader -->
    <section id="Donate_subheader" style= "
             @if(isset($settings->Donate_subheader))
             background: url({{'/storage/' .$settings->Donate_subheader}}) fixed;
             @endif height: 350px;"
             class="subheader dark no-top no-bottom"  data-stellar-background-ratio=".2">
        <div class="overlay-bg t70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>@lang('donate.title')</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom" dir="{{ config('app.locale') == 'ar' ? 'rtl' : '' }}" lang="{{ config('app.locale') == 'ar' ? 'ar' : '' }}">
        <section aria-label="section-timeline">
            <div class="container" style="text-align: center;">

                <div id="betterplace_donation_iframe" style="background: transparent url('https://www.betterplace.org/assets/new_spinner.gif') 275px 20px no-repeat;"><strong><a href="https://www.betterplace.org/en/projects/70740-syrian-youth-assembly-e-v/donations/new">Jetzt Spenden für „Syrian Youth Assembly e.v.“ bei unserem Partner betterplace.org</a></strong>
                </div>

            </div>
        </section>
    </div>
    <!-- content close -->



@endsection

<script type="text/javascript">
  /* Configure at https://www.betterplace.org/en/projects/70740-syrian-youth-assembly-e-v/manage/iframe_donation_form/new */
  var _bp_iframe        = _bp_iframe || {};
  _bp_iframe.project_id = 70740; /* REQUIRED */
  _bp_iframe.lang       = 'en'; /* Language of the form */
  _bp_iframe.width = 600; /* Custom iframe-tag-width, integer */
  _bp_iframe.color = '0099cc'; /* Button and banderole color, hex without "#" */
  _bp_iframe.background_color = 'ffffff'; /* Background-color, hex without "#" */
  _bp_iframe.default_amount = 50; /* Donation-amount, integer 1-99 */
  _bp_iframe.recurring_interval = 'single'; /* Interval for recurring donations, string out of ["single", "monthly", "quarter_yearly", "half_yearly", "yearly"] */
  _bp_iframe.bottom_logo = true;
  (function() {
    var bp = document.createElement('script'); bp.type = 'text/javascript'; bp.async = true;
    bp.src = 'https://betterplace-assets.betterplace.org/assets/load_donation_iframe.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(bp, s);
  })();
</script>