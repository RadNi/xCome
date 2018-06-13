import unittest

from selenium import webdriver


class UserPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_profile_exam_reg(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        exam_reg = driver.find_element_by_id("exam-reg")
        exam_reg.click()

        assert "http://127.0.0.1:8000/profile/exam-reg" == driver.current_url

    def test_profile_apply_pay(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        user_apply_pay = driver.find_element_by_id("apply-pay")
        user_apply_pay.click()
        assert "http://127.0.0.1:8000/profile/apply-pay" == driver.current_url

    def test_profile_foreign_pay(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        user_foreign_pay = driver.find_element_by_id("foreign-pay")
        user_foreign_pay.click()
        assert "http://127.0.0.1:8000/profile/for-pay" == driver.current_url

    def test_profile_ret_money(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        user_ret_mon = driver.find_element_by_id("retr-mon")
        user_ret_mon.click()
        assert "http://127.0.0.1:8000/profile/ret-mon" == driver.current_url

    def test_profile_int_trans(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        user_int_trans = driver.find_element_by_id("int-pay")
        user_int_trans.click()
        assert "http://127.0.0.1:8000/profile/int-trans" == driver.current_url

    def test_profile_wallet(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        user_wallet = driver.find_element_by_id("wallet")
        user_wallet.click()
        assert "http://127.0.0.1:8000/profile/wallet" == driver.current_url

    def tearDown(self):
        self.driver.close()
