<table class="mailform__table" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th>お名前<span class="area-contact-hissu">必須</span></th>
                    <td>
                      <input class="wide100" id="namae" type="text" name="お名前(必須)" size="35" style="width: 50%" />
                    </td>
                  </tr>
                  <tr>
                    <th>ふりがな<span class="area-contact-hissu">必須</span></th>
                    <td><input type="text" id="furigana" name="ふりがな(必須)" size="35" style="width: 50%;"
                      class="wide100 validate[optional,custom[onlyKana]]" data-prompt-position="bottomLeft" pattern="[\u3041-\u3096]*"></td>
                  </tr>
                  <tr>
                  <th>希望連絡先<span class="hissu">必須</span></th>
                  <td><label>
                      <input type="radio" name="希望連絡先(必須)" id="optionsRadios1" value="お電話" checked="checked" />
                      お電話</label>
                    <label>
                      <input type="radio" name="希望連絡先(必須)" id="optionsRadios2" value="メール" />
                      メール</label>
                  </td>
                </tr>
                <!-- 表示非表示切り替え -->

                <tr>
                  <th>電話番号<span class="hissutel ">必須</span></th>
                  <td><input type="text" id="tel_id" name="電話番号(必須)" size="45" style="width: 60%;"
                      class="validate[optional,custom[phone]]" data-prompt-position="bottomLeft" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}">
                    ※0-9の半角数字以外にハイフンのみ使用いただけます
                  </td>
                </tr>

                <!-- 表示非表示切り替え -->

                <tr>
                  <th>メールアドレス<span class="hissumail dispnone">必須</span></th>
                  <td><input type="text" id="mail_id" name="email" size="45" maxlength="50"
                      style="width: 60%;" class="validate[optional,custom[email],custom[onlyLetterNumber]]" data-prompt-position="bottomLeft"></td>
                </tr>
                  <tr>
                      <th>
                        オリーブ・東大阪高井田を<br />
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
                    <th>お問い合わせ内容<span class="hissu">必須</span></th>
                    <td>
                      <textarea name="お問い合わせ内容(必須)" rows="10" cols="45" style="height: 120px; width: 80%"></textarea>
                    </td>
                  </tr>
                  <tr class="btn__submit">
                    <td colspan="2" style="text-align: center">
                      <input type="submit" value="メールを送信する" />
                    </td>
                  </tr>
                </table>
                
