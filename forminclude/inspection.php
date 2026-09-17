<table class="mailform__table" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <th>見学ご希望日<span class="area-contact-hissu">必須</span></th>
                      <td>
                        第一希望
                        <input name="第一見学希望日(必須)" type="text" id="datepicker" size="15" style="width: 90px;" />
                        →
                        <select name="第一希望時間(必須)">
                          <option value="">時間帯</option>
                          <option value="9時30分">9時30分</option>
                          <option value="10時">10時</option>
                          <option value="11時">11時</option>
                          <option value="12時">12時</option>
                          <option value="13時">13時</option>
                          <option value="14時">14時</option>
                          <option value="15時">15時</option>
                          <option value="16時">16時</option>
                          <option value="17時">17時</option>
                        </select>
                        <br />
                        第二希望
                        <input name="第二見学希望日" type="text" id="datepicker2" size="15" />
                        →
                        <select name="第二希望時間">
                          <option value="">時間帯</option>
                          <option value="9時30分">9時30分</option>
                          <option value="10時">10時</option>
                          <option value="11時">11時</option>
                          <option value="12時">12時</option>
                          <option value="13時">13時</option>
                          <option value="14時">14時</option>
                          <option value="15時">15時</option>
                          <option value="16時">16時</option>
                          <option value="17時">17時</option>
                        </select>
                        <br />
                        第三希望
                        <input name="第三見学希望日" type="text" id="datepicker3" size="15" />
                        →
                        <select name="第三希望時間">
                          <option value="">時間帯</option>
                          <option value="9時30分">9時30分</option>
                          <option value="10時">10時</option>
                          <option value="11時">11時</option>
                          <option value="12時">12時</option>
                          <option value="13時">13時</option>
                          <option value="14時">14時</option>
                          <option value="15時">15時</option>
                          <option value="16時">16時</option>
                          <option value="17時">17時</option>
                        </select>
                        <br />
                        <p style="
                              font-size: 14px;
                              color: #f00;
                              line-height: 1.2em !important;
                              margin: 0;
                            ">
                          ※同一日時は選択できません。第三希望までご記入いただいても<br />
                          当日の施設の都合で、承れない事もございます。ご了承ください。<br />
                          ※直近の希望はフリーダイヤル0120-78-4850をご利用ください。
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <th>
                        見学ご希望人数<span class="area-contact-hissu">必須</span>
                      </th>
                      <td>
                        <select name="見学ご希望人数(必須)">
                          <option value="1人">1人</option>
                          <option value="2人">2人</option>
                          <option value="3人">3人</option>
                          <option value="4人">4人</option>
                          <option value="5人">5人</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>お名前<span class="area-contact-hissu">必須</span></th>
                      <td>
                        <input class="wide100" id="namae3" type="text" name="お名前(必須)" size="35" style="width: 50%" />
                      </td>
                    </tr>
                    <tr>
                      <th>ふりがな<span class="area-contact-hissu">必須</span></th>
                      <td><input id="furigana3" type="text" name="ふりがな(必須)" size="35" style="width: 50%;"
                        class="validate[optional,custom[onlyKana]] wide100" data-prompt-position="bottomLeft" pattern="[\u3041-\u3096]*"></td>
                    </tr>
                    <tr>
                      <th>希望連絡先<span class="area-contact-hissu">必須</span></th>
                      <td>
                        <label>
                          <input type="radio" name="希望連絡先(必須)" id="optionsRadios1" value="お電話" checked="checked" />
                          お電話</label>
                        <label>
                          <input type="radio" name="希望連絡先(必須)" id="optionsRadios2" value="メール" />
                          メール</label>
                      </td>
                    </tr>
                    <!-- 表示非表示切り替え -->

                    <tr>
                      <th>電話番号<span class="area-contact-hissu area-contact-hissu--tel">必須</span></th>
                      <td><input type="text" id="tel_id" name="電話番号(必須)" size="45" style="width: 60%;"
                         class="validate[optional,custom[phone]]" data-prompt-position="bottomLeft" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}">
                      ※0-9の半角数字以外にハイフンのみ使用いただけます
                      </td>
                    </tr>

                    <!-- 表示非表示切り替え -->

                    <tr>
                      <th>
                        メールアドレス<span class="area-contact-hissu area-contact-hissu--mail dispnone">必須</span>
                      </th>
                      <td><input type="text" id="mail_id" name="email" size="45" maxlength="50"
                        style="width: 60%;" class="validate[optional,custom[email],custom[onlyLetterNumber]]" data-prompt-position="bottomLeft"></td>
                    </tr>
                    <tr>
                      <th>入居予定者様とのご関係</th>
                      <td>
                        <ul>
                          <li>
                            <input type="radio" name="ご関係" value="ご本人" />
                            ご本人
                          </li>
                          <li>
                            <input type="radio" name="ご関係" value="配偶者" />
                            配偶者
                          </li>
                          <li>
                            <input type="radio" name="ご関係" value="父" />
                            父
                          </li>
                          <li>
                            <input type="radio" name="ご関係" value="母" />
                            母
                          </li>
                          <li>
                            <input type="radio" name="ご関係" value="親族" />
                            親族
                          </li>
                          <li>
                            <input type="radio" name="ご関係" value="友人・知人" />
                            友人・知人
                          </li>
                          <li>
                            <input type="radio" name="ご関係" value="その他" />
                            その他
                          </li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <th>入居予定者様の介護認定</th>
                      <td>
                        <select name="介護認定">
                          <option selected="selected" value="">
                            選択してください
                          </option>
                          <option value="自立">自立</option>
                          <option value="介護認定申請中">
                            介護認定申請中
                          </option>
                          <option value="要支援1">要支援1</option>
                          <option value="要支援2">要支援2</option>
                          <option value="要介護1">要介護1</option>
                          <option value="要介護2">要介護2</option>
                          <option value="要介護3">要介護3</option>
                          <option value="要介護4">要介護4</option>
                          <option value="要介護5">要介護5</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th>
                        スーパー・コートを<br />
                        お知りになったきっかけ<br />
                        <span class="area-contact-hissu">必須</span>
                      </th>
                      <td>
                        <ul>
                        <li><input type="radio" name="きっかけ(必須)" value="インターネット">インターネット</li>
                        <li><input type="radio" name="きっかけ(必須)" value="広告・チラシ">広告・チラシ</li>
                        <li><input type="radio" name="きっかけ(必須)" value="テレビCM">テレビCM</li>
                        <li><input type="radio" name="きっかけ(必須)" value="役所のテレビ広告">役所のテレビ広告</li>
                        <li><input type="radio" name="きっかけ(必須)" value="ラジオ">ラジオ</li>
                        <li><input type="radio" name="きっかけ(必須)" value="介護事業所">介護事業所</li>
                        <li><input type="radio" name="きっかけ(必須)" value="病院">病院</li>
                        <li><input type="radio" name="きっかけ(必須)" id="kikkake_sonota_id" value="その他">その他<span class="hissusonota dispnone">必須</span><input type="text" name="その他内容" id="kikkake_sonotanaiyou_id" size="35" style="width: 50%;" /></li>
                      </ul>
                      </td>
                    </tr>
                    <tr>
                      <th>
                        スーパー・コートのテレビCMをご覧になられたことはありますか<br />
                        <span class="area-contact-hissu">必須</span>
                      </th>
                      <td>
                        <ul>
                          <li>
                            <input type="radio" name="テレビCM(必須)" value="ある" />
                            ある
                          </li>
                          <li>
                            <input type="radio" name="テレビCM(必須)" value="ない" />
                            ない
                          </li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <th>見学時に詳しく知りたいことなど</th>
                      <td>
                        <textarea name="ご質問・ご意見" rows="10" cols="45" style="height: 120px; width: 80%"></textarea>
                      </td>
                    </tr>
                    <tr class="btn__submit">
                      <td colspan="2" style="text-align: center">
                        <input type="submit" value="メールを送信する" />
                      </td>
                    </tr>
                  </tbody>
                </table>
                