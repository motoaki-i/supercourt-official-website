<table class="mailform__table" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <th>お名前<span class="area-contact-hissu">必須</span></th>
                      <td>
                        <input class="wide100" id="namae2" type="text" name="お名前(必須)" size="35" style="width: 50%" />
                      </td>
                    </tr>
                    <tr>
                      <th>ふりがな<span class="area-contact-hissu">必須</span></th>
                      <td><input type="text" id="furigana2" name="ふりがな(必須)" size="35" style="width: 50%;"
                        class="validate[optional,custom[onlyKana]] wide100" data-prompt-position="bottomLeft" pattern="[\u3041-\u3096]*"></td>
                    </tr>
                    <tr>
                      <th>ご住所</th>
                      <td>
                        郵便番号<span class="area-contact-hissu">必須</span>
                        <input type="text" name="郵便番号(必須)" size="10" style="width: 60px;" class="validate[optional,custom[yubin]]" data-prompt-position="bottomLeft" pattern="\d{3}-?\d{4}">
                        <input onclick="mfpc('mailform-data_request','郵便番号(必須)','住所(必須)');" type="button" value="住所検索" id="postinuput" />
                        <br />
                        市区町村・番地<span class="area-contact-hissu">必須</span>
                        <input type="text" name="住所(必須)" size="45" style="width: 70%" />
                      </td>
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
                      <th>入居予定者様の情報</th>
                      <td>
                        介護認定
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
                      <th>ご入居希望時期</th>
                      <td>
                        <ul>
                          <li>
                            <input type="radio" name="入居希望時期" value="できるだけ早く" />
                            できるだけ早く
                          </li>
                          <li>
                            <input type="radio" name="入居希望時期" value="1〜2ヶ月以内" />
                            1〜2ヶ月以内
                          </li>
                          <li>
                            <input type="radio" name="入居希望時期" value="2〜3ヶ月以内" />
                            2〜3ヶ月以内
                          </li>
                          <li>
                            <input type="radio" name="入居希望時期" value="3〜6ヶ月以内" />
                            3〜6ヶ月以内
                          </li>
                          <li>
                            <input type="radio" name="入居希望時期" value="将来の為に" />
                            将来の為に
                          </li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <th>
                        スーパー・コートを<br class="br_sp" />
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
                      <th>スーパー・コートのテレビCMをご覧になられたことはありますか<span class="area-contact-hissu">必須</span></th>
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
                      <th>ご質問・ご意見</th>
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
                