<div>
   <div bgcolor="#DFDFDF" style="background:#dfdfdf;margin:0px;padding:0;width:100%">
      <table bgcolor="#DFDFDF" border="0" cellpadding="0" cellspacing="0" style="background:#dfdfdf;border-collapse:collapse;line-height:130% !important;margin:0;padding:0;width:100%">
         <tbody>
            <tr>
               <td valign="top" style="border-collapse:collapse">
                  <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;margin:20px auto 20px auto">
                     <tbody>
                        <tr>
                           <td valign="top" style="border-collapse:collapse">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
                                 <tbody>
                                    <tr>
                                       <td bgcolor="#FFFFFF" style="border-collapse:collapse">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td bgcolor="#F6F6F6" style="border-collapse:collapse;color:#333333;font-family:'calibri' , sans-serif;font-size:16px;padding:10px">
											<strong>Грузовладелец</strong>: {{implode($gruzowners, ", ")}}<br>
											<strong>RFQ</strong>: 
											<a href="https://admin.7rights.ru/admin/rfqs/{{$rfq->id}}" target="_blank" style="color:#284a98;padding:0;text-decoration:underline" data-link-id="1" rel="noopener noreferrer">{{$rfq->title}} [ID: {{$rfq->id}}]</a>
											<br>
											<strong>Дата начала</strong>: {{$rfq->start}}<br>
											<strong>Дата окончания</strong>: {{$rfq->finish}}<br>
											<strong>Тип транспорта</strong>: {{implode($typetrans_arr, ", ")}}</td>
                                    </tr>
                                    <tr>
                                       <td bgcolor="#EEEEEE" style="border-collapse:collapse;color:#333333;font-family:'calibri' , sans-serif;font-size:16px;padding:10px">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td bgcolor="#FFFFFF" style="border-collapse:collapse;color:#333333;font-family:'calibri' , sans-serif;font-size:16px;padding:10px">
                                          <div>Dear Sir or Madam,<br><br>the aforementioned preselection will end on {{$rfq->finish}}. We request that you submit an offer in Freight Procurement under 
										  <!--<a href="https://ticontract.transporeon.com/" target="_blank" style="color:#284a98;padding:0;text-decoration:underline" data-link-id="2" rel="noopener noreferrer">https://</a>.-->
										  @if(!is_null($rfq->contact))
										  <br><br>Контактное лицо: {{$rfq->contact->fio}}</div>
                                          <!--<div>Компания: «»<br>-->
											<span class="ca6710e1bb46a547js-phone-number_mr_css_attr">{{$rfq->contact->mobile}}</span><br>
											<a href="http://e.mail.ru/compose/?mailto={{$rfq->contact->email}}" target="_blank" data-link-id="3" rel="noopener noreferrer">{{$rfq->contact->email}}</a>
										  </div>
										  @endif
										  @if(!is_null($rfq->contact_2))
										  <br><br>Контактное лицо: {{$rfq->contact_2->fio}}</div><br>
                                          <!--<div>Компания: «»<br>-->
											<span class="ca6710e1bb46a547js-phone-number_mr_css_attr">{{$rfq->contact_2->mobile}}</span><br>
											<a href="http://e.mail.ru/compose/?mailto={{$rfq->contact_2->email}}" target="_blank" data-link-id="4" rel="noopener noreferrer">{{$rfq->contact_2->email}}</a>
										  </div>
										  @endif
                                       </td>
                                    </tr>
                                    <tr>
                                       <td bgcolor="#FFFFFF" style="border-collapse:collapse;color:#333333;font-family:'calibri' , sans-serif;font-size:16px;padding:10px">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td bgcolor="#F6F6F6" style="border-collapse:collapse;color:#333333;font-family:'calibri' , sans-serif;font-size:14px;padding:10px"><strong>Customer Care</strong><br>If you still have questions about Transporeon, our support team is at your disposal.<br><br>help center:<br>Website:<br><br><strong>Russia</strong><br><font size="1">Russia <span class="ca6710e1bb46a547js-phone-number_mr_css_attr">+7 </span>(Mo-Fr 10:00-20:00 MSK)</font><br>&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td style="border-collapse:collapse;color:#333333;font-family:'calibri' , sans-serif;font-size:12px;padding:10px">&nbsp;</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>